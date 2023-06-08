<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChatUser;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\UserChat;
use App\Models\UserOldData;

class HomeController extends ChatController
{
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            if(session('conversation_id')) {
                $chat = UserChat::find(session('conversation_id'));
                foreach($chat->history_data as $data) {
                    return $data;
                }
                
                session()->forget('conversation_id');
            }

            $conversation_id = $this->generateUniqueID(15);
            session(['conversation_id' => $conversation_id]);
            UserChat::create([
                'user_id' => session('user')->id,
                'conversation_id' => $conversation_id,
                'name' => 'New Chat',
            ]);

            return response()->json([
                'success' => true,
            ]);

        } else {   
            return view('frontend.home');
        }
    }
    
}
