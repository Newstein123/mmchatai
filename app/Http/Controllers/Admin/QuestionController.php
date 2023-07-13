<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\UserChat;
use App\Models\UserOldData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function history_data(Request $request)
    {   
        $query = Chat::latest();
        $question = $request->query('question');

        if($question) {
            $query->where('human', 'like', "%$question%");
        }

        $history_data = $query->paginate(10)->appends($request->except('page'));
        return view('admin.question.history_data', compact('history_data'));
    }

    public function old_data(Request $request)
    {
        $query = UserOldData::latest();
        $question = $request->query('question');

        if($question) {
            $query->where('question', 'like', "%$question%");
        }

        $old_data = $query->paginate(10)->appends($request->except('page'));
        return view('admin.question.old_data', compact('old_data'));
    }

    public function showHistoryAnswer($id) {
        $res = Chat::find($id);
        if($res) {
            return view('admin.question.show_history_data', compact('res'));
        } else {
            return false;
        }
    }
    public function showOldAnswer($id) {
        $res = UserOldData::find($id);
        if($res) {
            return view('admin.question.show_old_data', compact('res'));
        } else {
            return false;
        }
    }
}
