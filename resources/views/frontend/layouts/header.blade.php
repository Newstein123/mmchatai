@php
    if(session('username')) {
        dd("hello");
    } else {
        dd("not exists");
    }
@endphp