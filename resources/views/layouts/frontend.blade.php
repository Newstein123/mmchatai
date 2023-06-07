@php
   if(session('user')) {
        $chats = App\Models\ChatUser::where('user_id', session('user')->id)->orderBy('id', 'desc')->get();
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
    <link rel="shortcut icon" href="{{asset('img/logo/'.generalSetting('logo'))}}" type="image/png">
    <title> {{generalSetting('title')}} | @yield('title') </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="overflow-hidden">
    @include('frontend.layouts.header')
    <div class="row overflow-x-hidden">
        <div class="col-md-3" id="chat_history_container">
            @include('frontend.layouts.parts.sidebar')
        </div>
        <div class="col-md-9" style="height : 500px">
            @yield('content')
        </div>
    </div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>