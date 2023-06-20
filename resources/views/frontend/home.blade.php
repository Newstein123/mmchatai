@extends('layouts.frontend')
@section('title', 'Home')
@section('content')

{{--show login form --}}
@if (!session('user'))
    @section('script')
       <script>
        $(document).ready(function() {
            $('#authForm').modal({
                backdrop: 'static',
                keyboard: false
            });

            $('#authForm').modal('show')
        });
       </script>
    @endsection
@endif
@include('frontend.layouts.parts.modal')
<div class="me-0 me-md-3">
    @if (session('message') && count($adpopup) > 0 )
        @section('script')
            <script>
            $(document).ready(function() {
                $('#adPopup').modal('show');
            });
            </script>
        @endsection
    @endif
    <div class="question-container mt-3">
        <form action="ai.php" method="post" id="form" class="text-center">
            <div class="d-flex align-items-center">
                <input type="text" name="prompt" id="prompt" class="w-100 form-control me-4" placeholder="Send a message..." required>
                <button id="generate" type="submit" class="btn bg-custom prompt-button"  > 
                    <i class="fa-regular fa-paper-plane me-2"></i>
                </button>
                <button id="text-loading" style="display: none;" class="btn bg-custom mt-2 mt-md-0 prompt-button me-2 me-md-0" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </form>
        <div class="data-container w-100 rounded mt-4 py-3 overflow-auto" style="height : 64vh">
            <div id="data">
                @if (session('conversation_id'))
                    @php
                        $chats = App\Models\Chat::where('conversation_id', session('conversation_id'))->orderBy('id', 'desc')->get();
                    @endphp
                    @foreach ($chats as $row)  
                    {{-- Questions --}}
                    <div class="d-flex my-2 bg-mute p-md-2 p-1">
                        <div class="me-2">
                            <i class="fa-solid fa-user bg-custom p-md-3 p-1 text-white rounded-circle me-2"></i>   
                        </div>
                        <div class="text-white myanmar-font">
                            <p>{!! $row->human !!}</p>
                        </div>
                    </div> 
                    {{-- Answers  --}}
                    <div class="d-flex my-2 p-md-2 p-1">
                        <div class="me-2">
                            <i class="fa-solid fa-reply p-md-3 p-1  text-white bg-success rounded-circle me-2"> </i>
                        </div>
                        <div class="text-white">
                            <p>{!! $row->translated_ai_text !!}</p>
                        </div>
                    </div>      
                    @endforeach
                @endif
            </div>
            
        </div>
        {{-- Ads  --}}
        <div class="">
            @if ($ads->count() <= 4)
                <div class="d-flex justify-content-between justify-content-sm-between flex-wrap justify-content-lg-between">
                    @foreach ($ads as $ad)
                        <div>
                            <a href="{{ $ad->link }}" target="{{$ad->link !== "#" ? "_black" : ""}}" onclick="adCount('{{route('adCount', $ad->id)}}', '{{$ad->link}}')">
                                <img src="{{ asset('storage/ads/' . $ad->image) }}" class="ad-image py-1">
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="pt-3">
                    @include('frontend.layouts.parts.ads')
                </div>
            @endif
           </div>
    </div>
</div>
@endsection
