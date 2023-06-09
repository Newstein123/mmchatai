@extends('layouts.app')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown d-flex align-items-center vh-100">
        <div>
            <a href="/" class="my-3">
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-75">
            </a>
            <h5 class="my-3">User Login</h5>
            @include('frontend.session.message')
            <form class="m-t" role="form" action="{{route('login.submit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control my-3 {{session('error') ? 'is-invalid' : ''}} " name="type" placeholder="Email Or Phone" required="">
                </div>
                @error('type')
                    <span class="text-danger">
                        <small> {{ $message }}</small>
                    </span>
                @enderror

                <div class="form-group">
                    <input type="password" class="form-control my-3" name="password" placeholder="Password" required="">
                </div>
                @error('password')
                    <span class="text-danger">
                        <small> {{ $message }}</small>
                    </span>
                @enderror
                <div class="my-3">
                    @if(config('services.recaptcha.key'))
                        <div class="g-recaptcha"
                            data-sitekey="{{config('services.recaptcha.key')}}">
                        </div>
                    @endif
                    @error('g-recaptcha-response')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                   @enderror
                </div>

                <button type="submit" class="btn bg-custom btn-sm block full-width m-b">Login</button>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{route('websitelogin','facebook')}}" class="btn bg-custom btn-sm text-white">
                        <i class="fab fa-facebook-f fa-fw"></i>
                        Login with Facebook
                    </a>
                    <a href="{{route('websitelogin','google')}}" class="btn bg-custom btn-sm text-white">
                        <i class="fa-brands fa-google"></i>
                        Login with Google
                    </a>       
                </div>
                
                <a href="{{ route('forgetpasswordForm') }}"><small>Forget Your Password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm bg-custom btn-block" href="{{route('register')}}">Create an account</a>
            </form>
        </div>
    </div>
@endsection
