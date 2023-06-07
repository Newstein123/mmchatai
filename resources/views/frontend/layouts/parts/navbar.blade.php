<nav class="navbar bg-light navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-25">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> About Us </a>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Our Services 
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
              <li><a class="dropdown-item" href="#">All Services </a></li>
              <li><a class="dropdown-item" href="#"> Website Development </a></li>
              <li><a class="dropdown-item" href="#"> Software Development </a></li>
              <li><a class="dropdown-item" href="#"> ECommerence Solutions </a></li>
              <li><a class="dropdown-item" href="#"> CCTV And Access Control </a></li>
              <li><a class="dropdown-item" href="#"> Server And Networking </a></li>
              <li><a class="dropdown-item" href="#"> IoT Development </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Our Products 
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/web-hosting.php" target="_blank"> Share Web Hosting </a></li>
              <li><a class="dropdown-item" href="#"> Domanin Registeration </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Supports  
            </button>
            <ul class="dropdown-menu dropdown-menu-light">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Portfolio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Contact Us </a>
          </li>
          @if (!session('user'))
          <li class="nav-item">
            <li class="nav-item dropdown">
              <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-light">
                <li><a class="dropdown-item" href="{{route('login')}}">Login </a></li>
                <li><a class="dropdown-item" href="{{route('register')}}"> Register </a></li>
              </ul>
            </li>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>