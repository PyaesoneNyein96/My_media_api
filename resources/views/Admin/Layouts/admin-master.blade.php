@extends('Admin.Layouts.app')


@section('title', 'Master')

@section('content')

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default nav-cus">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                {{-- <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a> --}}
                <a class="navbar-brand" href="./">My Media</a>
                <a class="navbar-brand hidden" href="./"> M </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Admin Dashboard </a>
                    </li>
                    <h5 class="menu-tile text-muted my-2">Main</h5><!-- /.menu-title -->

                    <li>
                        <a href="{{ route('admin@dashboard') }}"> <i class="menu-icon fa fa-laptop"></i>Dashbaord</a>
                    </li>

                    <li>
                        <a href=" {{ route('admin@Profile') }} "> <i class="menu-icon fa-solid fa-user"></i></i>Profile</a>
                    </li>

                    <li>
                        <a href="{{ route('admin@admin-list') }}"> <i class="menu-icon fa-solid fa-users-gear"></i>Admin
                            List</a>
                    </li>

                    <li>
                        <a href="{{ route('admin@articles') }}"><i class="menu-icon  fa-solid fa-book-open"></i>Articles</a>
                    </li>

                    <li>
                        <a href="{{ route('admin@Category') }}"> <i class="menu-icon fa fa-tasks"></i>Categories</a>
                    </li>

                    <li>
                        <a href="#"> <i class="menu-icon fa-solid fa-heart-circle-bolt"></i>Article's
                            Features</a>
                    </li>

                    <li>
                        <a href="{{ route('admin@trend') }}"> <i class="menu-icon fa fa-area-chart"></i>Trend Articles</a>
                    </li>
                    <h3 class="menu-title">More Options</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-gears fa-lg"></i>Setting</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- ========== Start Right Pannel ========== -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header" style="position: sticky; top:0px; z-index:10">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('images/avatar/1.jpg') }}"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('images/avatar/2.jpg') }}"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('images/avatar/3.jpg') }}"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </span>
                                </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('images/avatar/4.jpg') }}"></span>
                                    <span class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('admin@Profile') }}"><i class="fa fa-user"></i> My
                                Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                {{-- <a class="nav-link" href=""><i class="fa fa-power-off"></i>
                                    Logout</a> --}}
                                <button type="submit" class="nav-link bg-transparent py-0 shadow-none border-0">
                                    <i class="fa fa-power-off"></i> Logout</button>
                            </form>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language"
                            aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>
        <!-- /header -->

        <div class="content mt-3">
            @yield('dashboard-content')
        </div>

        <!-- .content -->
    </div>

    <!-- ========== End Section ========== -->



@endsection

@section('script')
    @yield('script-content')
@endsection
