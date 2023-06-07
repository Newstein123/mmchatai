<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Chat;

class DashboardController extends Controller
{
    public function index(Request $request)
    {      
        $users_count = Customer::select('id')->sum('id');
        $tokens = Chat::select('total_tokens')->sum('total_tokens');
        return view('admin.dashboard', compact('users_count', 'tokens'));
    }
}
