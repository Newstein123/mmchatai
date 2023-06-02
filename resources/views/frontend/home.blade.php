@extends('layouts.frontend')
@section('content')
<div class="container-fluid my-3">
    <button type="button" id="toggle" class="bg-custom btn mt-3" style="display : none">
        <i class="fa-solid fa-bars"></i>
    </button>
    <button type="button" id="close" class="bg-danger btn mt-3 text-white" style="display : none">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="row mt-2">
        {{-- sidebar  --}}
        <div class="col-md-9 question-container">
            <form action="ai.php" method="post" id="form" class="text-center">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <input type="text" name="prompt" id="prompt" class="form-control w-75 w-sm-100" placeholder="Send a message..." required>
                    <button id="generate" type="submit" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0"> 
                    <i class="fa-regular fa-paper-plane me-2"></i> Generate 
                    </button>
                    <button id="text-loading" style="display: none;" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Generating
                    </button>
                </div>
            </form>
            <div class="data-container w-100 rounded mt-4 p-3" style="height: 500px">
                <div id="data"></div>
                <div id="loading" style="display : none"> Loading ... </div>
            </div>
        </div>
    </div>
</div>
@endsection