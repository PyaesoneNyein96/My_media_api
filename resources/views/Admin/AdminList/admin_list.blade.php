@extends('Admin.Layouts.admin-master')


@section('title', 'Admin List')


@section('dashboard-content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div>
                    @if (session('info'))
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('info') }}f
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                <div class="col-md-12 ">
                    <div class="card  ">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title col-6">Admin List
                                <span class="badge badge-pill px-2 bg-primary">
                                    <span class="text-light">Total:</span> {{ $users->total() }}</span>
                            </strong>
                            <div class="input-wrap col-4 ">
                                <form action="{{ route('admin@admin-list') }}" class=" d-flex" method="get">
                                    @csrf
                                    <input type="text" name="key"
                                        class="form-control form-control-sm me-1 shadow-none"
                                        placeholder="Search users . . ." value={{ request('key') }}>
                                    <button class="btn btn-sm  rounded btn-outline-primary">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div style="height:50px" class="p-2">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm ">
                                <thead>
                                    <tr>
                                        <th class="d-none d-md-table-cell">No</th>
                                        <th>Name</th>
                                        <th class="d-none d-md-table-cell">Email</th>
                                        <th>Phone</th>
                                        <th class="d-none d-md-table-cell">Address</th>
                                        <th class="d-none d-md-table-cell">Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="d-none d-md-table-cell text-center">
                                                {{ $loop->index + $users->firstItem() }}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td class="d-none d-md-table-cell">{{ $user->address }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{-- {{ $user->gender }} --}}
                                                {{ $user->gender == 1 ? 'Male' : 'Female' }}
                                            </td>
                                            <td class="text-center">
                                                @if (Auth::id() == $user->id)
                                                    <a href="">
                                                        <button class="btn btn-success btn-sm rounded">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </button>
                                                    </a>
                                                @endif

                                                @if (Auth::id() != $user->id)
                                                    <a href="#"
                                                        href="{{ route('admin@adminList-delete', $user->id) }}"
                                                        class=" ">
                                                        <button class="btn btn-danger btn-sm rounded"
                                                            @disabled(Auth::user()->name == $user->name)>
                                                            <i class="fa-solid fa-user-xmark fa-xs"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

                @if ($users->total() == 0)
                    <div class="col-md-12 mt-5">
                        <h3 class="text-center mx-auto py-2 text-light bg-secondary rounded w-75">
                            There is nothing related to ( <span class="text-warning">{{ request()->key }}</span> ) here ;(
                        </h3>
                    </div>
                @endif

            </div>
        </div><!-- .animated -->
    </div>
@endsection
