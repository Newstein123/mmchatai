<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{generalSetting('title')}} | @yield('title') </title>
    <link rel="shortcut icon" href="{{asset('img/logo/'.generalSetting('logo'))}}" type="image/png">
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('template/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/css/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/plugins/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/plugins/splide/splide.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="wrapper">
        @include('admin.layouts.parts.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.layouts.parts.header')
            <div class="wrapper wrapper-content">
                @yield('content')
                @include('admin.layouts.parts.footer')
            </div>  
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('template/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('template/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{asset('template/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('template/js/plugins/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('template/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('template/js/demo/peity-demo.js') }}"></script>
    <script src="{{ asset('template/js/inspinia.js') }}"></script>
    <script src="{{ asset('template/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>
    <script src="{{asset('template/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('template/js/demo/sparkline-demo.js')}}"></script>
    <script src="{{asset('template/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{asset('template/js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('template/js/plugins/switchery/switchery.js')}}"></script>
    <script src="{{asset('template/js/plugins/splide/splide.min.js')}}"></script>
    <script src="{{ asset('template/js/ajax_method.js') }}"></script>
    <script src="{{ asset('template/js/script.js') }}"></script>
    <script>
        $('.switchery').each(function() {
            new Switchery(this);
        });
    </script>
</body>
</html>
