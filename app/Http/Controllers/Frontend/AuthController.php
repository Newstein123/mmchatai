<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        session()->put('user', $user);
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user) {
            $check = Hash::check($request->password, $user->password);
            if($check) {
                session(['user' => $user]);
                return redirect('/')->with('message', 'Login Successfully');
            } else {
                return redirect()->back()->with('error', 'Your password is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Your email is incorrect');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout()
    {   
        session()->forget('user');
        return redirect('/');
    }
}
