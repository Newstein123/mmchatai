<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatUser;
use App\Models\UserChat;
use App\Models\UserOldData;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function history_data()
    {   
        $history_data = UserChat::all();
        return view('admin.question.history_data', compact('history_data'));
    }

    public function old_data()
    {
        $old_data = UserOldData::orderBy('id', 'desc')->get();
        return view('admin.question.old_data', compact('old_data'));
    }
}
