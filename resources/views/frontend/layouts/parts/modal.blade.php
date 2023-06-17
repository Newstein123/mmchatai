<script>
    $(document).ready(function() {
        $('#authForm').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#authForm').modal('show')
    });
</script>

{{-- Auth form  --}}

  <div class="modal fade" id="authForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center auth-modal-body">
            <div class="modal-img">
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-100">
            </div>
            <div class="modal-button mt-4">               
                    <a href="{{route('login')}}" class="btn btn-sm bg-custom w-100 my-2"> Login </a>
                    <a href="{{route('register')}}" class="btn btn-sm bg-custom w-100 my-2"> Register </a>
            </div>
            @if (session('SuccessPassword'))
              <div class="col-12 py-2">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check"></i> {{session('SuccessPassword')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
        @endif
        </div>
      </div>
    </div>
  </div>

  {{-- end auth form  --}}
    {{-- Ads popup modal  --}}
    <div class="modal fade ad-popup" id="adPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">       
          <div class="modal-body">
            @if ($adpopup)
                {{-- <a href="{{ $adpopup->link }}"> --}}
                  <img src="{{asset('storage/ads/'.$adpopup->image)}}" alt="" class="img-fluid">  
                {{-- </a>  --}}
              @endif 
          </div>
        </div>
      </div>
    </div>

  {{-- ads popup modal ends  --}}
