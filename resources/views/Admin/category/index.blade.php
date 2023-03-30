@extends('Admin.Layouts.admin-master')


@section('title', 'Categories')


@section('dashboard-content')

<div class="content">
    @if (session('info'))
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success">Success</span>
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="row">
        <div class="input-wrap col-4  my-4">
            <form action="{{ route('admin@Category') }}" class=" d-flex" method="get">
                @csrf
                <input type="text" name="key" class="form-control form-control-sm me-1 shadow-none"
                    placeholder="Search users . . ." value={{ request('key') }}>
                <button class="btn btn-sm  rounded btn-outline-primary">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body px-3">
                    <div class="card-title">
                        @isset ($categoryEdit)
                        Update
                        @else
                        Add Category
                        @endisset
                    </div>

                    <form action="@isset($categoryEdit) {{ route('admin@categoryUpdate') }}
                            @else
                            {{ route('admin@categoriesAdd') }}
                        @endisset" method="post">

                        @csrf
                        @isset($categoryEdit)
                        <input type="hidden" name="id" value="{{ $categoryEdit->id }}">
                        @endisset


                        <div class="card-body shadow-sm">

                            <!-- ========== TITLE Section ========== -->
                            <label class="small text-muted">Add New Category here</label>
                            <input type="text" name="categoryName" class="form-control form-control-sm shadow-none @error('categoryName')
                                is-invalid
                            @enderror" placeholder="Cateogry Name" @isset($categoryEdit)
                                value="{{ $categoryEdit->title }}" @endisset>
                            @error('categoryName')
                            <small class="d-block text-danger">{{ $message }}</small>
                            @enderror


                            <!-- ========== DESCRIPTION Section ========== -->

                            <label class="small text-muted mt-3">Add New Category Description here</label>
                            <textarea name="categoryDescription" class="form-control form-control-sm shadow-none @error('categoryDescription')
is-invalid
                            @enderror" placeholder="Description .." rows="2">@isset($categoryEdit){{ $categoryEdit->description }} @else  @endisset
                                </textarea>

                            @error('categoryDescription')
                            <small class="d-block text-danger">{{ $message }}</small>
                            @enderror
                            <hr class="bg-info ">

                            @isset($categoryEdit)
                            <button type="submit" class="btn btn-success btn-sm rounded px-4">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary btn-sm rounded px-4">Add</button>
                            @endisset

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ========== Right side ========== -->
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body">
                    <h4 class="mx-auto text-muted mb-3">
                        Categories
                    </h4>
                    <ul>
                        @foreach ($categories as $category)
                        <div class="accordion my-2" id="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button btn-light btn-sm py-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="{{ '#z' . $category->id }}">
                                        <span class="text-muted">{{ $loop->index + 1 }} . </span>
                                        {{ $category->title }}
                                    </button>
                                </h2>
                                <div id="{{ 'z' . $category->id }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <strong class="h6 text-muted">This is Description of <span
                                                class="text-success">{{ $category->title }}</span>
                                        </strong>

                                        <div class="float-end my-3">
                                            <a href="{{ route('admin@categoryEdit', $category->id) }}">
                                                <button class="btn btn-success btn-sm py-0">Edit</button>
                                            </a>
                                            <a href="{{ route('admin@categoryDelete',$category->id) }}">
                                                <button class="btn btn-danger btn-sm py-0 ">Delete</button>
                                            </a>
                                        </div>

                                        <p class="small">{{ $category->description }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
        <!-- ========== End Right side ========== -->
    </div>

    @endsection
