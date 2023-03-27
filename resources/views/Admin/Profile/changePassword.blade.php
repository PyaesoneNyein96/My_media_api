@extends('Admin.Layouts.admin-master')


@section('title', 'Password Change')


@section('dashboard-content')

    <div class="col-sm-12">


    </div>

    <div class="p-1">
        @if (session('info'))
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span>
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('err'))
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-danger">Sorry</span>
                {{ session('err') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="sufee-login d-flex align-content-center flex-wrap mt-0">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="images/logo.png" alt="">
                            <h3> Change Password </h3>
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('admin@changePass') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="oldPassword"
                                    class="form-control @error('oldPassword') is-invalid @enderror"
                                    placeholder="Old Password">
                                @error('oldPassword')
                                    <small class="text-danger ps-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="newPassword"
                                    class="form-control @error('newPassword') is-invalid @enderror"
                                    placeholder="New Password">
                                @error('newPassword')
                                    <small class="text-danger ps-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>confirm Password</label>
                                <input type="password" name="confirm_password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    placeholder="Old Password">
                                @error('confirm_password')
                                    <small class="text-danger ps-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                                <label class="pull-right">
                                    <a href="#">Forgotten Password?</a>
                                </label>

                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Change Password</button>
                            {{-- <div class="social-login-content">
                                <div class="social-button">
                                    <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i
                                            class="ti-facebook"></i>Sign in with facebook</button>
                                    <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i
                                            class="ti-twitter"></i>Sign in with twitter</button>
                                </div>
                            </div> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
