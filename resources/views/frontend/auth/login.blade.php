@extends('layouts.app')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div class="logo-name">
                IN+
            </div>
            <h3>Welcome to MISL ChatAI</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p> Login </p>
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
                        <i class="fab fa-google fa-fw"></i>
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
            <p class="m-t"> <small> MISL &copy; 2014</small> </p>
        </div>
    </div>
@endsection
