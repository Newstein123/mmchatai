@extends('layouts.frontend')
@section('content')
<div class="container-fluid my-3">
    <div class="alert alert-warning" style="display: none">
        <p> Authentication fail, please login to continue. </p>
    </div>
    <button type="button" id="toggle" class="bg-custom btn mt-3" style="display : none">
        <i class="fa-solid fa-bars"></i>
    </button>
    <button type="button" id="close" class="bg-danger btn mt-3 text-white" style="display : none">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="question-container">
        <form action="ai.php" method="post" id="form" class="text-center">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <input type="text" name="prompt" id="prompt" class="form-control w-75 w-sm-100" placeholder="Send a message..." required>
                <button id="generate" type="submit" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0"  > 
                <i class="fa-regular fa-paper-plane me-2"></i> Generate 
                </button>
                <button id="text-loading" style="display: none;" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Generating
                </button>
            </div>
        </form>
        <div class="data-container w-100 rounded mt-4 p-3" style="height: 500px">
            <div id="data">
                @if (session('conversation_id'))
                    @php
                        $chats = App\Models\Chat::where('conversation_id', session('conversation_id'))->get();
                    @endphp
                    @foreach ($chats as $row)
                        <h5 class="lh-base p-3 rounded bg-light my-2"> <i class="fa-solid fa-user p-2 text-white bg-primary rounded-circle me-2"></i>  {{$row->human}} </h5>
                        <p class="history-answer lh-lg p-3 my-2"> <i class="fa-solid fa-exclamation px-3 py-2 text-white bg-success rounded-circle me-2"></i> {{$row->translated_ai_text}} </p>
                    @endforeach
                @endif
            </div>
            <div id="loading" style="display : none"> Loading ... </div>
        </div>
    </div>
</div>
@endsection