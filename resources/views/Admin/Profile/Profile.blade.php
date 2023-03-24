@extends('Admin.Layouts.admin-master')


@section('title', 'Profile')

@section('dashboard-content')

    <form action="" class="col-md-8 mx-auto mt-5 bg-light bg-gradient shadow-sm p-3 py-5 rounded">

        <div class="form-group row text-center mb-3">
            <div class="col-3 ">Name</div>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control form-control-sm shadow-none">
            </div>
        </div>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ">Email</div>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control form-control-sm shadow-none">
            </div>
        </div>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ">Phone</div>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control form-control-sm shadow-none">
            </div>
        </div>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ">Address </div>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control form-control-sm shadow-none">
            </div>
        </div>

    </form>

    <div class="btn-wrap text-center mt-4">
        <button class="btn btn-outline-primary">Update</button>
        <a href="" class="text-decoration-none ms-4">Change Password</a>
    </div>



@endsection
