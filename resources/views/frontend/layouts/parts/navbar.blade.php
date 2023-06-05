<nav class="navbar bg-light navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container d-flex justify-content-between">
      <a class="navbar-brand" href="{{route('home')}}"> မေးချင်တာမေးဖြေချင်တာဖြေမယ် </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          @if (session('user'))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{session('user')->name}}
              </a>
              <ul class="dropdown-menu">
                  <li>
                    <form action="{{route('logout')}}" method="POST">
                      @csrf 
                      <button type="submit" class="dropdown-item"> Logout </button>
                    </form>
                  </li>
              </ul>
            </li>
          @else 
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('login')}}"> Login </a>
              </li>
          @endif
        </ul>
      </div>
    </div>
</nav>