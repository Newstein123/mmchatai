<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 bg-custom rounded" href="#"><i class="fa fa-bars"></i> </a>
    </div>
        <div class="px-5">
            <ul class="nav navbar-top-links navbar-right">
                <li class="text-capitalize font-weight-bold">
                    <i class="fa fa-user mr-2"></i> {{ auth()->user()->name }}
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                        <i class="fa fa-sign-out"></i> 
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>