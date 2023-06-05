<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container d-flex justify-content-between">
      <a class="navbar-brand" href="index.php"> မေးချင်တာမေးဖြေချင်တာဖြေမယ် </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          @if (auth()->user())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{auth()->user()->name}}
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
                  <a class="nav-link" aria-current="page" href="login.php"> Login </a>
              </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>