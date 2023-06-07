@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
<div class="container-fluid my-3">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}. Welcome {{ session('user') ? session('user')->name : ''}}  </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
        </div>
    @endif
    <div class="alert alert-warning text-center my-3" style="display: none">
        <p> Authentication fail, please login to continue. </p>
    </div>
    <div class="question-container">
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
        <div class="data-container w-100 rounded mt-4 p-3 overflow-scroll" style="height : 80vh">
            <div id="data">
                @if (session('conversation_id'))
                    @php
                        $chats = App\Models\Chat::where('conversation_id', session('conversation_id'))->get();
                    @endphp
                    @foreach ($chats as $row)
                        <h5 class="lh-base p-3 rounded bg-light my-2"> <i class="fa-solid fa-user p-2 text-white bg-custom rounded-circle me-2"></i>  {{$row->human}} </h5>
                        <p class="history-answer lh-lg p-3 my-2"> <i class="fa-solid fa-exclamation px-3 py-2 text-white bg-success rounded-circle me-2"></i> {{$row->translated_ai_text}} </p>
                    @endforeach
                @endif
            </div>
            <div id="loading" style="display : none"> Loading ... </div>
        </div>
    </div>
</div>
@endsection