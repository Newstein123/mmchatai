<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AiResponseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatHistoryResource;
use App\Http\Resources\ChatNameResource;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Models\User;
use App\Models\UserChat;
use Illuminate\Http\Request;

class ChatController extends AiResponseController
{
    public function index($id) {
        $user_id = 1;
        $chat = UserChat::where('conversation_id', $id)->where('user_id', $user_id)->get();
        return ChatResource::collection($chat)->additional([
            "success" => true,
            "count" => $chat->count(),
        ]);
    }

    public function chat_name() {
        $user_id = 1;
        $chat = UserChat::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return ChatNameResource::collection($chat)->additional([
            'success' => true,
            "count" => $chat->count(),
        ]); 
    }
 
    public function aiResponse(Request $request) {
        $user_id = $request->user_id ?? 1;
        $prompt = $request->prompt;
        $conversation_id = $request->conversation_id ?? 'kadfladf77ad';
        $input = $this->extractInput($prompt);
        $data = $this->getAiResponse($user_id, $conversation_id, $input, $prompt);
        return response()->json($data);
    }
}
