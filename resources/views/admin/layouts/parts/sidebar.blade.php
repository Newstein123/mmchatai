<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="profile-element">
                    <div class=" d-flex justify-content-between align-items-center">
                        <img src="{{ asset('img/logo/' . generalSetting('logo')) }}" alt=""
                            class="img-fluid w-50 p-2 rounded-circle">
                        <span class="text-white"> {{ generalSetting('Website Name') }} </span>
                    </div>
                </div>
                <div class="logo-element">
                    <img src="{{ asset('img/logo/' . generalSetting('logo')) }}" alt=""
                        class="img-fluid p-2 rounded-circle">
                </div>
            </li>
            <li class="{{ url()->current() == url('/admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span
                        class="nav-label">Dashboards</span></a>
            </li>
            @can('view users')
                <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
                    <a href="{{ route('userIndex') }}"><i class="fa fa-users"></i> <span class="nav-label"> Admin
                            အသုံးပြုသူများ </span></a>
                </li>
            @endcan
            @can('view customers')
                <li class="{{ request()->is('admin/customer*') ? 'active' : '' }}">
                    <a href="{{ route('customerIndex') }}"><i class="fa fa-users"></i> <span class="nav-label"> Customers
                        </span></a>
                </li>
            @endcan
            @can('view questions')
                <li class="{{ request()->is('admin/question*') ? 'active' : '' }}">
                    <a href=""><i class="fa fa-question-circle"></i> <span class="nav-label"> Questions </span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @can('view account setting')
                            <li class="{{ request()->is('admin/question/history-data') ? 'active' : '' }}"><a
                                    href="{{ route('historyData') }}"> Customer Questions </a></li>
                        @endcan
                        @can('view permissions')
                            <li class="{{ request()->is('admin/question/old-data') ? 'active' : '' }}"><a
                                    href="{{ route('oldData') }}"> Customer Old Questions </a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{-- ads link --}}
            @can('view ads')
                <li class="{{ request()->is('admin/ads*') ? 'active' : '' }}">
                    <a href="{{ route('ads#Page') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Advertise</span></a>
                </li>
            @endcan

            @can('view keywords')
                <li class="{{ request()->is('admin/keywords*') ? 'active' : '' }}">
                    <a href="{{ route('keywordIndex') }}"><i class="fa fa-key" aria-hidden="true"></i> <span class="nav-label"> Keyword Finder </span></a>
                </li>
            @endcan
            @can('view setting')
                <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label"> Setting </span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @can('view account setting')
                            <li class="{{ request()->is('admin/setting/account*') ? 'active' : '' }}"><a
                                    href="{{ route('accountShow', auth()->id()) }}"> Account Setting </a></li>
                        @endcan
                        @can('view permissions')
                            <li class="{{ request()->is('admin/setting/permission*') ? 'active' : '' }}"><a
                                    href="{{ route('permissionIndex') }}"> Permissions </a></li>
                        @endcan
                        @can('view general setting')
                            <li class="{{ request()->is('admin/setting/general*') ? 'active' : '' }}"><a
                                    href="{{ route('generalIndex') }}"> General Setting </a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</nav>
