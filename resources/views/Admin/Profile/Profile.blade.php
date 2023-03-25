@extends('Admin.Layouts.admin-master')


@section('title', 'Profile')

@section('dashboard-content')

    <form action="" class="col-md-8 mx-auto mt-5 bg-light bg-gradient shadow-sm p-3 py-5 rounded">
        <h3 class="text-center mb-4 text-muted">USER PROFILE</h3>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start">Name</div>
            <div class="col-md-6">
                <input type="text" value="{{ $user->name }}" class="form-control form-control-sm shadow-none"
                    placeholder="Name . . .">
            </div>
        </div>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start ">Email</div>
            <div class="col-md-6">
                <input type="text" value="{{ $user->email }}" class="form-control form-control-sm shadow-none"
                    placeholder="Email . . .">
            </div>
        </div>
        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start ">Phone</div>
            <div class="col-md-6">
                <input type="text" value="{{ $user->phone }}" class="form-control form-control-sm shadow-none"
                    placeholder="Phone . . .">
            </div>
        </div>

        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start ">Gender </div>
            <div class="col-md-6">
                <select class="form-select shadow-none form-select-sm">
                    <option hidden disabled>Select Gender</option>
                    <option value=1 @selected($user->gender == 1)>Male</option>
                    <option value=0 @selected($user->gender == 0)>Female</option>
                </select>
            </div>
        </div>

        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start ">Address </div>
            <div class="col-md-6">
                <textarea class="form-control shadow-none" rows="2" placeholder="Address . . .">{{ $user->address }}
                </textarea>
            </div>
        </div>

        <div class="form-group row text-center mb-3">
            <div class="col-3 ps-5  text-start ">Biography </div>
            <div class="col-md-6">
                {{-- <input type="text" class="form-control form-control-sm shadow-none"> --}}
                <textarea class="form-control shadow-none" rows="2" placeholder="Biography . . .">{{ $user->bio }}
                </textarea>
            </div>
        </div>

    </form>

    <div class="btn-wrap text-center mt-4">
        <button class="btn btn-outline-primary rounded">Update</button>
        <a href="" class="text-decoration-none ms-4">Change Password</a>
    </div>



@endsection
