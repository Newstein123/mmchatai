<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AiResponseController;
use App\Models\Ad;
use App\Models\Chat;
use App\Models\UserChat;
use App\Models\UserOldData;
use Illuminate\Http\Request;

class ChatController extends AiResponseController
{   
    public function aiResponse(Request $request)
    {
        $prompt = $request->prompt;
        $input = $this->extractInput($prompt);

        if(session('user')) { 
            $data = $this->getAiResponse(session('user')->id, session('conversation_id'),$input, $prompt);
            return response()->json($data);
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
        $chats = Chat::where('conversation_id', $id)->orderBy('id','desc')->get();
        $adpopup = Ad::where('position', 'popup')->where('status', 'yes')->first();
        if(count($chats) > 0) {
            return view('frontend.chat.detail', compact('chats'));
        } else {
            return redirect('/');
        }
    }

    public function chat_name_update(Request $request, $id)
    {   
        $chat = UserChat::where('conversation_id', $id)->first();

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

    // Delete one conversation 
    public function chat_delete($id)
    {   
        if(session('conversation_id') == $id) {
            session()->forget('conversation_id');
        }
        
        $chat = UserChat::where('conversation_id', $id)->first();
        if($chat) {
            $chat->delete();
            $conversation = Chat::where('conversation_id', $id)->get();
            foreach($conversation as $con) {
                UserOldData::create([
                    'user_id' => session('user')->id,
                    'question' => $con->human,
                    'answer' => $con->translated_ai_text,
                ]);
                
                $con->delete();
            }

            return response()->json([
                'success' => true,
                'message' => 'Your convsersation has been deleted',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }
    }

    // Delete All Conversation 
    public function clear_all()
    {
        if(session('user')) {
            if($this->deleteUserConversations(session('user')->id)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Chat Cleared',
                    'data' => [],
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something Wrong, please try again',
                ]);
            }
            
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong, user not found.',
            ]);
        }
    }

    // Import user deleted data to old data 
    function deleteUserConversations($user_id) {
        $chat = UserChat::where('user_id', $user_id)->pluck('conversation_id')->toArray();
        if($chat) {
            $user_old_data = Chat::whereIn('conversation_id', $chat)->get();

            // insert user old data to new table 
            foreach($user_old_data as $row) {
                UserOldData::create([
                    'user_id' => $user_id,
                    'question' => $row->human,
                    'answer' => $row->translated_ai_text,
                ]);
            }

            // delele user old data 
            Chat::whereIn('conversation_id', $chat)->delete();

            // delete user conversation 
            UserChat::where('user_id', session('user')->id)->delete();
            // delete conversation id 
            session()->forget('conversation_id');
            return true;
        } else {
            return false;
        }
    }
}
