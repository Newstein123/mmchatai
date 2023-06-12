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


<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="authForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center">
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