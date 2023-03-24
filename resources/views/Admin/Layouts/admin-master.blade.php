@extends('Admin.Layouts.app')


@section('title', 'Master')

@section('content')

    <div class="d-flex bg-dark px-3 justify-content-between  position-sticky top-0" style="z-index:10; height:50px">

        <div class=" align-items-center">
            <p class="brand text-light">My media</p>
        </div>


        <div class="d-flex  align-items-center ">
            <li class="list-group-item me-3">
                <a href="" class="text-light text-decoration-none">
                    <span class="d-none d-md-inline">Profile</span>
                    <i class="fa-solid fa-user d-inline d-md-none"></i>
                </a>
            </li>
            <li class="list-group-item me-3">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="btn text-light text-decoration-none bg-transparent border-none shadow-none">
                        <span class="d-md-inline d-none">Logout</span>
                        <i class="fa-solid fa-arrow-right-from-bracket d-inline d-md-none"></i>
                    </button>
                </form>
            </li>
            <li class="list-group-item me-3">
                <a href="" class="text-light text-decoration-none">
                    <span class="d-md-inline d-none">Setting</span>
                    <i class="fa-solid fa-gear d-inline d-md-none"></i>
                </a>
            </li>
        </div>
    </div>


    <!-- ==========NAV End Section ========== -->

    <div class="container-fluid bg-dark">


        <!-- ========== Sidebar Start Section ========== -->

        <div class="row">
            <div class="col-2 bg-dark  aside"
                style="height:auto;  background: url(https://www.nawpic.com/media/2020/black-background-nawpic-16.jpg);  background-repeat: repeat-y;">
                <ul class="aside-ul position-sticky mt-4 p-2" style="position:fixed; top:90px;">

                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@dashboard') }}" class="h5 fw-light text-decoration-none text-light ">
                            <i class="fa-solid fa-laptop fa-sm"></i> <span class="d-none d-lg-inline">Dashboard</span></a>
                    </li>
                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@Profile') }}" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-solid fa-user"></i> <span class="d-none d-lg-inline"> Profile</span></a>
                    </li>
                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@admin-list') }}" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-brands fa-adn"></i> <span class="d-none d-lg-inline">Admin List</span></a>
                    </li>
                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@Category') }}" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-solid fa-list"></i> <span class="d-none d-lg-inline">Category</span></a>
                    </li>
                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@articles') }}" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-solid fa-file-pen"></i> <span class="d-none d-lg-inline">Article</span></a>
                    </li>
                    <li class="list-group-item mb-4">
                        <a href="{{ route('admin@trend') }}" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-solid fa-arrow-trend-up"></i> <span class="d-none d-lg-inline">Trend
                                Post</span></a>
                    </li>
                    {{-- <li class="list-group-item mb-4">
                        <a href="" class="h5 fw-light text-decoration-none text-light">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="d-none d-lg-inline">Log
                                out</span></a>
                    </li> --}}


                </ul>

            </div>

            <div class="col-10 col-md-10  bg-dark bg-gradient effect" style="min-height:100vh;">
                @yield('dashboard-content')
            </div>
        </div>

    </div>
@endsection
