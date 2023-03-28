@extends('Admin.Layouts.admin-master')


@section('title', 'Profile')

@section('dashboard-content')

    <div class="col-sm-12">
        @if (session('info'))
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span>
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>

    <div class="py-5 ">

        <form action="{{ route('admin@profileUpdate') }}" method="post"
            class="col-md-8 mx-auto mt-3 bg-light bg-gradient shadow-sm p-3 py-5 rounded">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">



            <h3 class="text-center mb-4 text-muted">USER PROFILE</h3>
            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1 text-start">Name</div>
                <div class="col-md-6">
                    <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                        class="form-control form-control-sm shadow-none lock @error('name')
                            is-invalid @enderror"
                        placeholder="Name . . .">
                    @error('name')
                        <div class="text-start text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1 text-start ">Email</div>
                <div class="col-md-6">
                    <input type="text" name="email" value="{{ old('email') ?? $user->email }}"
                        class="form-control form-control-sm shadow-none lock @error('email')
                            is-invalid @enderror"
                        placeholder="Email . . .">
                    @error('email')
                        <div class="text-start text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1 text-start ">Phone</div>
                <div class="col-md-6">
                    <input type="text" name="phone" value="{{ old('phone') ?? $user->phone }}"
                        class="form-control form-control-sm shadow-none lock" placeholder="Phone . . .">
                </div>
            </div>

            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1  text-start ">Gender </div>
                <div class="col-md-6">
                    <select class="form-select shadow-none form-select-sm lock" name="gender">
                        <option hidden disabled>Select Gender</option>
                        <option value="male" @selected($user->gender == 'male')>Male</option>
                        <option value="female" @selected($user->gender == 'female')>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1 text-start ">Address </div>
                <div class="col-md-6">
                    <textarea class="form-control shadow-none lock" name="address" rows="2" placeholder="Address . . .">{{ old('address') ?? $user->address }}
                </textarea>
                </div>
            </div>

            <div class="form-group row text-center mb-3">
                <div class="col-3 col-md-2 offset-md-1  text-start ">Biography </div>
                <div class="col-md-6">
                    <textarea class="form-control shadow-none lock" name="bio" rows="2" placeholder="Biography . . .">{{ old('bio') ?? $user->bio }}
                </textarea>

                </div>
            </div>
            <div class="btn-wrap text-center mt-4">
                <button type="submit" class="btn btn-outline-primary btn-sm rounded lock" id="update">Update</button>
                <span class="btn btn-success btn-sm" id="change-btn">
                    Unlocked
                </span>
                <a href="{{ route('admin@changePassPage') }}" class="text-decoration-none ms-4">Change Password</a>


            </div>


        </form>

    </div>



@endsection

@section('script-content')
    <script>
        $(document).ready(() => {
            $('.lock').attr('disabled', true)
            $('#change-btn').click(function() {
                let lock = $('.lock');
                if (lock.attr('disabled')) {
                    lock.attr('disabled', false)
                    $('#change-btn').html('locked');

                } else {
                    $('#change-btn').html('Unlock');
                    lock.attr('disabled', true);

                }

            })
        })
    </script>
@endsection
