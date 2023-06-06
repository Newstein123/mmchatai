<nav class="navbar bg-light navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container d-flex justify-content-center">
      <a class="navbar-brand text-custom fs-2" href="{{route('home')}}" style="font-family : Myanmar Sans Pro"> မေးချင်တာမေးဖြေချင်တာဖြေမယ် </a>
      @if (!session('user'))
        <a href="{{route('login')}}" class="text-decoration-none text-dark"> Login </a>
      @endif
</nav>