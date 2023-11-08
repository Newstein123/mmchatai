<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\UserChat;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Illuminate\Support\Carbon;
use Google\Cloud\Translate\V2\TranslateClient;

class AiResponseController extends Controller
{
    protected function extractInput($prompt) {
        if($this->isEnglishWord($prompt)) {
            $input = $prompt;
        } else {
            $input = $this->translate('en', $prompt);
        }

        return $input;
    }

    protected function getAiResponse($user_id, $conversation_id,$input, $prompt) {
            $user = UserChat::where('user_id', $user_id)->first();
            if($user) {
                $results = Chat::where('conversation_id', $user->conversation_id)->limit(5)->get();
            } else {
                $results = [];
            }
            $messages[] = ["role" => 'system', "content" => "You are a helpful assistant."];
            foreach($results as $row) {
                $messages[] = ["role" => 'user', "content" => $row->translated_human_text];
                $messages[] = ["role" => 'assistant', "content" => $row->ai];
            }
            
            $response = $this->chatGptResponse($input);
            if (isset($response['choices'][0]['message']['content'])) {
                header('Content-type: text/event-stream');
                header('Cache-Control: no-cache');
                $ai = $response['choices'][0]['message']['content'];
                $prompt_tokens = $response['usage']['prompt_tokens'];
                $completion_tokens = $response['usage']['completion_tokens'];
                $total_tokens = $response['usage']['total_tokens'];
                $chatgpt_response = $this->translate('my', $ai);
        
                if (!$conversation_id) {
                    // Generate a new unique ID
                    $conversation_id = $this->generateUniqueID(15);
                    $chat_name = $prompt;
                    UserChat::create([
                        'name' => $chat_name,
                        'user_id' => session('user')->id,
                        'conversation_id' => $conversation_id,
                    ]);
                    
                    session(['conversation_id' => $conversation_id]);
                } else {
                    $conversation_id = $conversation_id;
                }
        
                // Expire Date Added 
                $currentDateTime = Carbon::now();
                $expirationDateTime = $currentDateTime->addMonth()->format('Y-m-d H:i:s');
                
                Chat::create([
                    'human' => $prompt,
                    'translated_human_text' => $input,
                    'ai' => $ai,
                    'translated_ai_text' => $chatgpt_response,
                    'prompt_tokens' => $prompt_tokens,
                    'completion_tokens' => $completion_tokens, 
                    'total_tokens' => $total_tokens,
                    'conversation_id' => $conversation_id,
                    'expired_date' => $expirationDateTime,
                ]);

                $chat_count = getConversationCount($user_id);
                // Create an associative array with  data
                $data = array(
                    'success' => true,
                    'message' => 'success',
                    'data' => $chatgpt_response,
                    'token' => $total_tokens,
                    'chat_count' => $chat_count <= 1 ? true : false,
                );
                header('Content-Type: application/json');
                return $data;
            } else {
                $data = array(
                    'success' => false,
                    'status' => 200,
                    'message' => 'Opps ! Something Wrong, try again later.',
                );
    
                header('Content-Type: application/json');
                return $data;
            }
    }

    protected function chatGptResponse($input) {
        $open_ai_key = generalSetting('openai_key'); // MISL Key 
            $open_ai = new OpenAi($open_ai_key);
            $messages[] = ['role' => 'user', 'content' => $input]; 
            $opts = [
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
                'temperature' => 1.0,
                'max_tokens' => $int = (int)generalSetting('max_tokens'),
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ];
            $complete = $open_ai->chat($opts, function ($curl_info, $data) use (&$txt) {
                if ($obj = json_decode($data) and $obj->error->message != "") {
                    error_log(json_encode($obj->error->message));
                } 
                echo PHP_EOL;
                ob_flush();
                flush();
                return strlen($data);
            });
            $response = json_decode($complete, true);
            return $response;
    }

    
    protected function generateUniqueID($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uniqueID = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, $charactersLength - 1);
            $uniqueID .= $characters[$randomIndex];
        }

        return $uniqueID;
    }


    protected function isEnglishWord($word) {
        $cleanedWord = preg_replace('/[^A-Za-z]/', '', $word);
        return $cleanedWord === $word;
    }
    
    protected function translate($lang, $text)
    {   
        // $google_api_key = "AIzaSyAsQ-ubN_yG4C-__3rXVD3UjPom_X7WJBY";
        $google_api_key = "AIzaSyAiAoYHpQ0rgfbaNnOKTwwEGBUX9jPvDgM";
        
        $translate = new TranslateClient([
            'key' => $google_api_key,
        ]);
        try {
            // Perform translation
            $translation = $translate->translate($text, [
                'target' => $lang,
            ]);
        
            // Get the translated text
            $translatedText = $translation['text'];
        
            return $translatedText;
        } catch (\Exception $e) {
            // Handle any errors that occur
            echo "Translation error: " . $e->getMessage();
        }
    }
}
