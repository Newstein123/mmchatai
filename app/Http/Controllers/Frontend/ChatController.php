<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Google\Cloud\Translate\V2\TranslateClient;
use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Support\Carbon;

class ChatController extends Controller
{   
    public function aiResponse(Request $request)
    {
        $prompt = $request->prompt;
        if($this->isEnglishWord($prompt)) {
            $input = $prompt;
        } else {
            $input = $this->translate('en', $prompt);
        }

        if(session('user')) { 

            $open_ai_key = "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"; // MISL Key 
            $open_ai = new OpenAi($open_ai_key);
            $user = ChatUser::where('user_id', session('user')->id)->first();
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
            $messages[] = ['role' => 'user', 'content' => $input]; 
            $opts = [
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
                'temperature' => 1.0,
                'max_tokens' => 300,
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
            if (isset($response['choices'][0]['message']['content'])) {
                header('Content-type: text/event-stream');
                header('Cache-Control: no-cache');
                $ai = $response['choices'][0]['message']['content'];
                $prompt_tokens = $response['usage']['prompt_tokens'];
                $completion_tokens = $response['usage']['completion_tokens'];
                $total_tokens = $response['usage']['total_tokens'];
                $chatgpt_response = $this->translate('my', $ai);
        
                if (!session('conversation_id')) {
                    // Generate a new unique ID
                    $conversation_id = $this->generateUniqueID(15);
        
                    // $parts = explode(" ", $input);
                    // $chat_name = implode(" ", array_slice($parts, 0, 4)); 
                    $chat_name = "New Chat";
                    ChatUser::create([
                        'name' => $chat_name,
                        'user_id' => session('user')->id,
                        'conversation_id' => $conversation_id,
                    ]);
                    
                    session(['conversation_id' => $conversation_id]);
                } else {
                    $conversation_id = session('conversation_id');
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
                    'expire_date' => $expirationDateTime,
                ]);
                // Create an associative array with your data
                $data = array(
                    'success' => true,
                    'message' => 'success',
                    'data' => $chatgpt_response,
                    'token' => $total_tokens,
                );
                header('Content-Type: application/json');
                return response()->json($data);
            } else {
                $data = array(
                    'success' => false,
                    'status' => 200,
                    'message' => 'You have no tokens left create another conversation',
                );
    
                header('Content-Type: application/json');
                return response()->json($data);
            }
        } else {
            $data = array(
                'success' => false,
                'status' => 401,
                'message' =>  'Authorization fail',
            );
            header('Content-Type: application/json');
            return response()->json($data);
        }
        
    }

    public function chat_detail($id)
    {
        $chats = Chat::where('conversation_id', $id)->get();
        if(count($chats) > 0) {
            return view('frontend.chat.detail', compact('chats'));
        } else {
            return view('frontend.home');
        }
    }

    public function chat_name_update(Request $request, $id)
    {   
        $chat = ChatUser::where('conversation_id', $id)->first();

        if($chat) {
            $chat->update([
                'name' => $request->name,
            ]);

            return response()->json([
                'success' => true,
                'data' => $chat,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message'=> "Something Wrong",
            ]);
        }
    }

    public function chat_delete($id)
    {
        $chat = ChatUser::where('conversation_id', $id)->first();
        if($chat) {
            $chat->delete();
            $conversation = Chat::where('conversation_id', $id)->get();
            foreach($conversation as $con) {
                $con->delete();
            }
            return response()->json([
                'success' => true,
                'message' => 'Chat Deleted',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }
    }

    public function clear_all()
    {
        if(session('user')) {
            ChatUser::where('user_id', session('user')->id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Chat Cleared',
                'data' => [],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }
    }

    function generateUniqueID($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uniqueID = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, $charactersLength - 1);
            $uniqueID .= $characters[$randomIndex];
        }

        return $uniqueID;
    }


    function isEnglishWord($word) {
        $cleanedWord = preg_replace('/[^A-Za-z]/', '', $word);
        return $cleanedWord === $word;
    }
    
    function translate($lang, $text)
    {   
        $google_api_key = "AIzaSyAsQ-ubN_yG4C-__3rXVD3UjPom_X7WJBY";
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
