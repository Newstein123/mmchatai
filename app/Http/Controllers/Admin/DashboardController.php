<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {      
        $users_count = Customer::select('id')->count('id');
        $tokens = Chat::select('total_tokens')->sum('total_tokens');
        $daily_tokens = Chat::whereDate('created_at', Carbon::now())->sum('total_tokens');
        return view('admin.dashboard', compact('users_count', 'tokens','daily_tokens'));
    }
}
