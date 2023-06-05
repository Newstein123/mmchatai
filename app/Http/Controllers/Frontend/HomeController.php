<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
}
