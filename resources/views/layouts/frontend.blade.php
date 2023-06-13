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
    @include('frontend.layouts.header')
    <div class="row home-container">
        <div class="col-12 col-md-3" id="chat_history_container">
            @include('frontend.layouts.parts.sidebar')
        </div>
        <div class="col-12 col-md-9">
            @yield('content')
        </div>
    </div>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/splide.min.js') }}"></script>
</body>

</html>
