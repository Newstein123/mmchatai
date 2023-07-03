<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> MMChatAi </title>
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">
    <link href="{{asset('template/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
</head>
<body class="gray-bg">
@yield('content')

<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/inspinia.min.js')}}"></script>
<script src="{{asset('template/popper.min.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

@yield('script')
</body>
</html>