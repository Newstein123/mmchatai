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
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-25">
            </div>
            <div class="modal-button my-3">
                <div class="d-flex justify-content-around">
                    <a href="{{route('login')}}" class="btn bg-custom"> Login </a>
                    <a href="{{route('register')}}" class="btn bg-custom"> Register </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  {{-- end auth form  --}}

    {{-- Ads popup modal  --}}
<div class="modal fade" id="adPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <img src="{{asset('storage/ads/'.$adpopup->image)}}" alt="" class="img-fluid">  
      </div>
    </div>
  </div>
</div>

  {{-- ads popup modal ends  --}}
