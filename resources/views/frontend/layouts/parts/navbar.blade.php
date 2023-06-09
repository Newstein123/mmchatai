
<nav class="navbar navbar-expand-lg bg-light sticky-top">
  <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid navbar-img">
      </a>
      <button class="navbar-toggler bg-custom btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
      {{!session('user') ? 'disabled' : ''}}
      >
        <i class="fa-solid fa-bars"></i>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item d-lg-block d-none">
          <a class="nav-link" href="https://myanmarictsolutions.pro/index.php" target="_blank">
            <i class="fa-solid fa-house me-1 text-custom"></i>  Home
          </a>
        </li>
        <li class="nav-item d-lg-block d-none">
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
        <li class="nav-item dropdown d-lg-block d-none">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Our Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/web-hosting.php" target="_blank"> Share Web Hosting </a></li>
            <li><a class="dropdown-item" href="https://myanmarictsolutions.pro/domain-registeration.php" target="_blank"> Domanin Registeration </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown d-lg-block d-none">
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
        <li class="nav-item d-lg-block d-none">
          <a class="nav-link" href="https://myanmarictsolutions.pro/portfolio-page.php"> Portfolio </a>
        </li>
        <li class="nav-item d-lg-block d-none">
          <a class="nav-link" href="https://myanmarictsolutions.pro/contact.php"> Contact Us </a>
        </li>
        <li class="nav-item d-lg-none">
          <a class="nav-link" href="{{ route('profilePage') }}"> Profile </a>
        </li>
        <li class="nav-item d-lg-none">
          <a class="nav-link"> Chat History 
            <span><i class="fa-solid fa-caret-down" id="toggle"></i></span> 
            <span><i class="fa-solid fa-caret-up" id="close" style="display: none"></i></span> 
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>