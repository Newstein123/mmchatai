<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/logo/' . generalSetting('logo')) }}" type="image/png">
    <title> {{ generalSetting('title') }} | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Profile</title>
</head>
<body>
    @include('frontend.layouts.header')

    <div class=" home-container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="p-5 text-white">
                    {{-- <a href="">Back</a> --}}
                    <h3 class="mb-3 text-center">Change Password</h3>
                    <form action="{{route ('ProfilePasswordChange') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <label class="control-label mb-3">Old Password</label>
                            <input  name="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Old Password...">
                            @error('oldpassword')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-3">New Password</label>
                            <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password">
                            @error('newpassword')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-3">Confirm Password</label>
                            <input  name="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password">
                            @error('confirmpassword')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-primary text-white btn-block mt-3">
                                <i class="fa-solid fa-key"></i>
                                <span id="payment-button-amount">Change Password</span>                                        
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @include('frontend.layouts.footer')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
</body>
</html>
