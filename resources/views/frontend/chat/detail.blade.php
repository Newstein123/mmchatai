@extends('layouts.frontend')
@section('content')
    <div class="overflow-auto vh-100">
        @if (count($chats) > 0)      
            @foreach ($chats as $row)
                <div class="conversation">
                    <!-- User question  -->
                    <div class="row align-items-center my-3 bg-light p-2 border">
                        <div class="col-md-1">
                            <i class="fa-solid fa-user p-3 text-white bg-primary rounded-circle"></i>
                        </div>
                        <div class="col-md-11">
                            <p> {{$row->human}}  </p> 
                        </div>
                    </div>
                    <!-- Ai Answer  -->

                    <div class="row align-items-center my-3 p-2">
                        <div class="col-md-1">
                            <i class="fa-solid fa-exclamation"></i>
                        </div>
                        <div class="col-md-11">
                            <p> {{$row->translated_ai_text}} </p> 
                        </div>
                    </div>
                </div>
            @endforeach 
        @endif
    </div>
@endsection