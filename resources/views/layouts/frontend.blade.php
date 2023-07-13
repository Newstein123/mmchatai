@php
    if (session('user')) {
        $chats = App\Models\UserChat::where('user_id', session('user')->id)
            ->orderBy('id', 'desc')
            ->get();
    } else {
        $chats = [];
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="chatgpt, myanmar, ai, openai, googletranslate">
    <link rel="shortcut icon" href="{{ asset('img/logo/' . generalSetting('logo')) }}" type="image/png">
    <title> {{ generalSetting('title') }} | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <style>
        .splide__slide img {
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        < script >
            document.addEventListener('DOMContentLoaded', function() {
                new Splide('#image-carousel').mount();
            });
    </script>
    </script>
</head>

<body>
    {{-- <div id="loading" class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="spinner-grow text-primary me-2" style="width: 2em" role="status"></div>    
        <div class="spinner-grow text-warning me-2" style="width: 1.5em; height : 1.5em" role="status"></div>    
        <div class="spinner-grow text-danger" style="width: 1em; height: 1em" role="status"></div>    
    </div> --}}
    <div class="mmchatai">
        @include('frontend.layouts.header')   
        <div class="home-container">
            <div class="row">
                <div class="col-12 col-lg-3" id="chat_history_container">
                    @include('frontend.layouts.parts.sidebar')
                </div>
                <div class="col-12 col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('frontend.layouts.footer')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    @yield('script')
    <script>
    </script>
</body>
</html>
