<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\KeyWord;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    public function index(Request $request) {
        $keywords = $request->query('keywords') ?? [];
        $question_count = 0;
        $user_count = [];
        if(count($keywords) > 0) {
            foreach($keywords as $keyword)    {
                $chat = Chat::with('user_chat')->where('human', 'like', '%' . $keyword . '%')->get();
                $question_count += count($chat);

                foreach ($chat as $message) {
                    $userId = $message->user_chat->user_id;
                    if (!in_array($userId, $user_count)) {
                        $user_count[] = $userId;
                    }
                }
            }
        }

        $total_question = Chat::count();
        $totalQuestionByPercentage = ($question_count / $total_question) * 100;
        $total_user = Customer::count();
        $totalUserByPercentage = (count($user_count) / $total_user) * 100;
        $keywords = KeyWord::latest()->get();
        return view('admin.keyword.index', compact('keywords', 'question_count', 'totalQuestionByPercentage', 'user_count', 'totalUserByPercentage'));
    }
}
