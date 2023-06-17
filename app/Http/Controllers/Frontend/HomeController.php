<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\UserChat;
use App\Models\UserOldData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends ChatController
{
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            if(session('conversation_id')) {
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
                'message' => 'Conversation created'
            ]);

        } else {   
            $adpopup = Ad::where('position', 'popup')->where('status', 'yes')->get();
            $ads = Ad::where('position', 'footer')->where('status', 'yes')->orderBy('created_at', 'desc')->get();
            return view('frontend.home',compact('ads', 'adpopup'));
        }
    }

    public function ad_count($id) {
        $ad = Ad::find($id);
        if($ad) {

            $ad->update([
                'click_counts' => $ad->click_counts + 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => "count updated",
                'data' => $ad->click_counts,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Ad not found",
            ]);
        }
    }
    
}
