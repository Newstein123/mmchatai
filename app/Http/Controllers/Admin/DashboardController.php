<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {      
        $users_count = Customer::select('id')->count('id');
        $todayUsers = Customer::whereDate('created_at', now())->count();
        $tokens = Chat::select('total_tokens')->sum('total_tokens');
        $daily_tokens = Chat::whereDate('created_at', Carbon::now())->sum('total_tokens');
        $questions = Chat::count();
        $usersByMonth = DB::table('customers')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_users'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();
        $userArray = array_fill(1, 12, 0);
        foreach ($usersByMonth as $row) {
            $month = intval($row->month);
            $count = intval($row->total_users);
            $userArray[$month] += $count;
        }
        $userData = array_values($userArray);

        $questionsByMonth = DB::table('chat_history')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_questions'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();
        $questionArray = array_fill(1, 12, 0);
        foreach ($questionsByMonth as $row) {
            $month = intval($row->month);
            $count = intval($row->total_questions);
            $questionArray[$month] += $count;
        }
        $questionData = array_values($questionArray);

        return view('admin.dashboard', compact('users_count', 'tokens','daily_tokens', 'questions', 'todayUsers', 'userData', 'questionData'));
    }
}
