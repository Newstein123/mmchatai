@extends('layouts.frontend')
@section('title', "UserChatDetail")
@section('content')
    <div class="overflow-auto me-3 p-2" style="height : 85vh">
        @if (count($chats) > 0)      
            @foreach ($chats as $row)
            <div class="d-flex my-2 bg-mute p-2 align-items-center">
                <div class="me-2">
                    <i class="fa-solid fa-user bg-custom p-3 text-white rounded-circle me-2" style="font-size: 12px"></i>   
                </div>
                <div class="text-white">
                    <h5>{!! $row->human !!}</h5>
                </div>
            </div>
            <div class="d-flex my-2 p-2">
                <div class="me-2">
                    <i class="fa-solid fa-reply p-3  text-white bg-success rounded-circle me-2" style="font-size: 12px"> </i>
                </div>
                <div class="text-white">
                    <p>{!! $row->translated_ai_text !!}</p>
                </div>
            </div>
            @endforeach 
        @endif
    </div>
@endsection