@extends('layouts.app')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <a href="/" class="my-3">
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-50">
            </a>
            <h3 class="my-3">User Login</h3>
            @if (session('error'))
                <div class="alert alert-danger">
                    <small class="fw-bold"> {{session('error')}} </small>
                </div>
            @endif
            <form class="m-t" role="form" action="{{route('login.submit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control my-3" name="email" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control my-3" name="password" placeholder="Password" required="">
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
                <div class="my-3">
                    @if(config('services.recaptcha.key'))
                        <div class="g-recaptcha"
                            data-sitekey="{{config('services.recaptcha.key')}}">
                        </div>
                    @endif
                </div>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm bg-custom btn-block" href="{{route('register')}}">Create an account</a>
            </form>
        </div>
    </div>
@endsection
