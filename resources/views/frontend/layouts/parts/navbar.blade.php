
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-25">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="https://myanmarictsolutions.pro/index.php" target="_blank">
            <i class="fa-solid fa-house me-1 text-custom"></i>  Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://myanmarictsolutions.pro/about-us.php" target="_blank"> About Us </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Our Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/our-services.php" target="_blank">All Services </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/web-development.php" target="_blank"> Website Development </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/software-development.php" target="_blank"> Software Development </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/e-commence-solution.php" target="_blank"> ECommerence Solutions </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/cctv-access-control.php" target="_blank"> CCTV And Access Control </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/sever-networking.php" target="_blank"> Server And Networking </a></li>
              <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/iot-development.php" target="_blank"> IoT Development </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Our Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/web-hosting.php" target="_blank"> Share Web Hosting </a></li>
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/domain-registeration.php" target="_blank"> Domanin Registeration </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Support 
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/supporttickets.php" target="_blank">Ticket</a></li>
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/knowledgebase"  target="_blank"> Knowledge </a></li>
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/announcement" target="_blank"> News And Announcement </a></li>
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/severstatus.php" target="_blank"> Network Status </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://myanmarictsolutions.pro/portfolio-page.php"> Portfolio </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://myanmarictsolutions.pro/contact.php"> Contact Us </a>
        </li>
        @if (!session('user'))
          <li class="nav-item">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">               
                <i class="fa-solid fa-user text-custom"></i>
              </a>            
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
</nav>