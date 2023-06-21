@extends('layouts.frontend')
@section('title', "UserChatDetail")
@section('content')
    <div class="overflow-auto me-3 p-2 detail-container" style="height : 100vh">
        @if (count($chats) > 0)      
            @foreach ($chats as $row)
            <div class="d-flex my-2 bg-mute p-md-2 p-1">
                <div class="me-2">
                    <i class="fa-solid fa-user bg-custom p-md-3 p-1 text-white rounded-circle me-2"></i>   
                </div>
                <div class="text-white">
                    <p>{!! $row->human !!}</p>
                </div>
            </div>
            <div class="d-flex my-2 p-md-2 p-1">
                <div class="me-2">
                    <i class="fa-solid fa-reply p-md-3 p-1 text-white bg-success rounded-circle me-2"> </i>
                </div>
                <div class="text-white">
                    <p>{!! $row->translated_ai_text !!}</p>
                </div>
            </div>
            @endforeach 
        @endif
    </div>
@endsection