<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegisterForm()
    {   
        if(session('user')) {
            return redirect()->to('/');
        }

        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {   

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required| same:password',
            'terms&policy' => 'required'
        ]);
        
        $user = new Customer();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        session()->put('user', $user);
        return redirect('/');
    }

    public function showLoginForm()
    {   
        if(session('user')) {
            return redirect()->to('/');
        }
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {   
    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = Customer::where('email', $request->email)->first();
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
        session()->forget('conversation_id');
        return redirect('/');
    }

    public function redirectToProvider($website)
    {
        return Socialite::driver($website)->redirect();
    }

    public function handleProviderCallback($website)
    {   
        $user = Socialite::driver($website)->user();
        $user=Customer::where('email',$user->getEmail())->first();
        if(!$user){
            $user = User::create([
                'name'=> $user->getName(),
                'email'=> $user->getEmail(),
                'password' => "",
                'login_type' => $website
            ]);

            session(['user' => $user]);
            return redirect()->route('home');
        } else {
            session(['user' => $user]);
            return redirect('/');
        } 
    }
}
