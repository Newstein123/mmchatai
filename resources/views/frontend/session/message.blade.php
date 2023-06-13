@if (session('error'))
    <div class="alert alert-danger p-1">
        <small class="fw-bold"> {{session('error')}} </small>
    </div>
@endif
@if (session('message'))
    <div class="alert alert-warning p-1">
        <small class="fw-bold"> {!! session('message') !!} </small>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success p-1">
        <small class="fw-bold"> {{session('success')}} </small>
    </div>
@endif