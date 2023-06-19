@extends('layouts.app')
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown d-flex align-items-center vh-100">
        <div>
            <a href="/" class="my-3">
                <img src="{{ asset('img/logo/' . generalSetting('logo')) }}" alt="" class="img-fluid w-75">
            </a>

            <h6 class="text-custom mt-3 p-4 shadow-sm">Password Verification has been send successfully.Please Check your
                email! </h6>
            <a href=""></a>
        </div>
    </div>
@endsection
