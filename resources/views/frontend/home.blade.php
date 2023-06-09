@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
<div class="me-0 me-md-3">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}. Welcome {{ session('user') ? session('user')->name : ''}}  </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
        </div>
    @endif
    <div class="alert alert-warning text-center my-3" style="display: none">
        <p> Authentication fail, please login to continue. </p>
    </div>
    <div class="question-container mt-3">
        <form action="ai.php" method="post" id="form" class="text-center">
            <div class="d-flex align-items-center">
                <input type="text" name="prompt" id="prompt" class="w-75 form-control me-4" placeholder="Send a message..." required>
                <button id="generate" type="submit" class="btn bg-custom prompt-button"  > 
                    <i class="fa-regular fa-paper-plane me-2"></i> <span class="d-none d-md-inline" >Generate </span>
                </button>
                <button id="text-loading" style="display: none;" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="d-none d-md-inline"> Generating </span>
                </button>
            </div>
        </form>
        <div class="data-container w-100 rounded mt-4 p-3 overflow-auto" style="height : 75vh">
            <div id="data">
                @if (session('conversation_id'))
                    @php
                        $chats = App\Models\Chat::where('conversation_id', session('conversation_id'))->get();
                    @endphp
                    @foreach ($chats as $row)
                        <div class="d-flex">
                            <div class="me-2"><i class="fa-solid fa-user bg-custom p-3 text-white rounded-circle" style="font-size: 12px"></i> </div>
                            <div class="text-white">
                                <p>{{$row->translated_ai_text}}</p>
                            </div>
                        </div>
                        <h5 class="lh-base text-white my-2 p-3 bg-mute"> 
                            <i class="fa-solid fa-user bg-custom p-3 text-white rounded-circle me-2" style="font-size: 12px"></i>  
                            {{$row->human}} 
                        </h5>
                        <p class="history-answer my-2 p-3 text-white">
                             <i class="fa-solid fa-reply p-3  text-white bg-success rounded-circle me-2" style="font-size: 12px">
                            </i> {{$row->translated_ai_text}} 
                        </p>
                    @endforeach
                @endif
            </div>
            <div id="loading" class="text-mute" style="display : none"> Loading ... </div>
        </div>
    </div>
</div>
@endsection