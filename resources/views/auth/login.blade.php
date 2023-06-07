@extends('layouts.app')
@section('content')
    <div class="text-center loginscreen animated fadeInDown d-flex justify-content-center align-items-center vh-100">
        <div class="w-25">
            <p>Welcome to MISL ChatAI  </p>
            <h3>Admin Login</h3>
            <form class="m-t" role="form" action="{{route('adminLogin')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" placeholder="Username"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus required="">
                </div>
                @error('email')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
                <div class="form-group">
                    <input type="password" class="form-control my-3" name="password" placeholder="Password" required="">
                </div>
                @error('password')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
                <button type="submit" class="btn bg-custom btn-sm block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small> MISL &copy; 2014</small> </p>
        </div>
    </div>
@endsection
