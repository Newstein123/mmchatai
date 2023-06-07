@extends('layouts.frontend')
@section('title', "UserChatDetail")
@section('content')
    <div class="vh-100 overflow-scroll home-container me-3">
        @if (count($chats) > 0)      
            @foreach ($chats as $row)
                <div class="conversation">
                    <!-- User question  -->
                    <h5 class="lh-base p-3 rounded bg-light my-2"> <i class="fa-solid fa-user p-2 text-white bg-custom rounded-circle me-2"></i>  {{$row->human}} </h5>
                    {{-- Ai Answer  --}}
                    <p class="history-answer lh-lg p-3 my-2 text-mute"> <i class="fa-solid fa-exclamation px-3 py-2 text-white bg-success rounded-circle me-2"></i> {{$row->translated_ai_text}} </p>
                </div>
            @endforeach 
        @endif
    </div>
@endsection