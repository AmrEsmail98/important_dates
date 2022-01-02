<!-- start main header -->
<div class="main-header hor-header">

    <div class="container">

        <div class="main-header-left">
            <a class="main-header-menu-icon d-lg-none" href="" id="mainNavShow"><span></span></a>
            <a class="main-logo" href="{{route('dashboard.home')}}">
                <img src="{{ asset("admin/images/logo.png") }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset("admin/images/icon.png") }}" class="header-brand-img icon-logo" alt="logo">
                <img src="{{ asset("admin/images/logo-light.png") }}" class="header-brand-img desktop-logo theme-logo"
                    alt="logo">
                <img src="{{ asset("admin/images/icon-light.png") }}" class="header-brand-img icon-logo theme-logo"
                    alt="logo">
            </a>
        </div>

        <div class="main-header-right">
            <div class="dropdown d-md-flex header-search">
                <a class="nav-link icon header-search">
                    <i class="las la-search trans-180Deg"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="main-form-search p-2">
                        <input class="form-control" placeholder="Search" type="text">
                        <button class="btn">
                            <i class="las la-search trans-180Deg"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link">
                    <i class="las la-expand fullscreen-button"></i>
                </a>
            </div>
            <div class="dropdown main-header-notification">
                <a class="nav-link icon" href="">
                    <i class="las la-bell"></i>
                    <span class="pulse bg-danger"></span>
                </a>
                <div class="dropdown-menu">
                    <p class="main-headNav-text text-center p-3">
                        You have 1 unread notification
                        <span class="badge rounded-pill bg-primary ms-3 text-white">View all</span>
                    </p>
                    <ul class="main-notification-list">

                        <li class="media d-flex">
                            <div class="flex-shrink-0 main-img-user online">
                                <img alt="avatar" src="{{ asset(" admin/images/5.jpg") }}">
                            </div>
                            <div class="flex-grow-1 ms-3 media-body">
                                <p>Congratulate <strong>Olivia James</strong> for New template start</p>
                                <span>Oct 15 12:32 pm</span>
                            </div>
                        </li>

                        <li class="media d-flex">
                            <div class="flex-shrink-0 main-img-user online">
                                <img alt="avatar" src="{{ asset("admin/images/5.jpg") }}">
                            </div>
                            <div class="flex-grow-1 ms-3 media-body">
                                <p>Congratulate <strong>Olivia James</strong> for New template start</p>
                                <span>Oct 15 12:32 pm</span>
                            </div>
                        </li>

                    </ul>
                    <div class="noti-footer text-center">
                        <a href="" class="text-primary">View All Notifications</a>
                    </div>
                </div>
            </div>
            <div class="dropdown main-profile-menu">
                <a class="main-img-user" href="">
                    <img alt="avatar" src="{{ asset("admin/images/1.jpg") }}">
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading text-center">
                        <h6 class="main-headNav-title">
                            @if (Auth::check())
                                {{ Auth::user()->first_name}}
                            @endif
                        </h6>
                    </div>
                    <ul class="profileMenu">

                        <li class="dropdown-item">
                            <a href="{{route('profile.index')}}">
                                <i class="las la-user"></i> My Profile
                            </a>
                        </li>

                        <li class="dropdown-item">
                            <a href="">
                                <i class="las la-cog"></i> Account Settings
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="">
                                <i class="las la-cog"></i> Support
                            </a>
                        </li>

                        @guest
                        @if (Route::has('login'))
                        <li class="dropdown-item">
                            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="dropdown-item">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="dropdown-item">

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                <i class="las la-power-off"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="dropdown d-md-flex header-settings">
                <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                    <i class="las la-bars"></i>
                </a>
            </div>
        </div>

    </div>

</div>
<!-- end main header -->
