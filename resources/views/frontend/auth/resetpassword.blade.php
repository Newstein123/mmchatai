@extends('layouts.app')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown d-flex align-items-center vh-100">
        <div>
            <a href="/" class="my-3">
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-75">
            </a>
            <h6 class="my-3">Create New Password</h6>
            @include('frontend.session.message')
            <form method="POST" action="{{ route('password#update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" class="form-control mb-3" name="password" placeholder="Enter Password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" class="form-control mb-3" name="password_confirmation" placeholder="Enter Confirm_Password" required>
                @error('password_confirmation')
                    <span>{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-sm bg-custom">New Password</button>
            </form>
        </div>
    </div>
@endsection
