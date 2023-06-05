@php
    $chats = App\Models\ChatUser::where('user_id', session('user')->id)->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> MMChatAi </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    @include('frontend.layouts.header')
    <div class="row my-3">
        <div class="col-md-3">
            @include('frontend.layouts.parts.sidebar')
        </div>
        <div class="col-md-9" style="height : 500px">
            @yield('content')
        </div>
    </div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>