@extends('Admin.Layouts.admin-master')


@section('title', 'Articles')


@section('dashboard-content')


<div class="d-flex justify-content-between ">
    <h4>Articles pages</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">Add Articles/ Posts </button>
</div>
@if (session('info'))
<div class="alert mt-3  alert-success alert-dismissible fade show" role="alert">
    <span class="badge badge-pill badge-success">Success !</span>
    {{ session('info') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
            @if ($posts->isEmpty())
            <div class="text-center p-2 mt-5 rounded bg-secondary">
                <h2 class="text-light">There is no Articles yet</h2>
            </div>
            @endif
            @foreach ($posts as $post )

            <div class="col-lg-4">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="px-2 bg-light text-muted">{{ $post->title }} </h4>

                            <!-- ========== Start Nav Setting ========== -->
                            <div class="user-area dropdown float-right" alt="Setting">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-gear fa-spin px-0"></i>
                                    <i class="fa fa-cog fa-spin px-0" style="font-size: 12px"></i>
                                </a>

                                <div class="user-menu dropdown-menu shadow rounded">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-bell fa-shake text-info"></i> Notification
                                    </a>
                                    <a class="nav-link" href="#">
                                        <i class="fa-solid fa-circle-info text-secondary"></i> Detail
                                    </a>
                                    <a class="nav-link" href="#">
                                        <i class="fa-regular fa-pen-to-square text-success"></i>
                                        Edit
                                    </a>
                                    <li class="nav-link delete_btn" style="cursor: pointer">
                                        <input type="hidden" value="{{ $post->id }}">
                                        <i class="fa-solid fa-trash-can text-danger"></i> Delete
                                    </li>

                                </div>
                            </div>
                            <!-- ========== End Nav Setting ========== -->

                        </div>
                    </div>

                    <div class="image">
                        <img src="{{ asset('Storage/Post/'.$post->image) }}"
                            style="height:250px; object-fit:contain; width:100%">
                    </div>

                    <div class="card-body">
                        <div class="title">
                            <span class="text-muted small">Date:
                                {{ $post->created_at->format('i/ M/ Y')}} |
                            </span>
                            <span class="text-muted small">{{ $post->created_at->diffForHumans() }}</span>
                            <span class="text-muted d-block small">Author: {{ $post->user_name }}</span>
                            <span class="h6 small text-muted">Category: {{ $post->category_name }}</span>
                            <hr class=" bg-dark">
                        </div>
                        <div class="pb-3" style="height:100px; overflow:hidden">
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>
                </div>


            </div>

            @endforeach

            <!-- ========== End Looping ========== -->

        </div>
        <!-- /# row -->

        <!-- ========== Start Dialog Add Content Box ========== -->
        <!-- ================================================== -->

        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Article</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin@postCreate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="post_user_id" value="{{ Auth::id() }}">
                            <!-- ========== Start Image ========== -->

                            <div class="mb-3">
                                <img src="" id="preImg" class="mb-2" alt=""
                                    style="max-height:250px; object-fit:contain; width:100%">

                                <input type="file" id="img" name="post_img" class="d-none form-control form-control-sm"
                                    onchange="document.getElementById('preImg').src=window.URL.createObjectURL(this.files[0])">

                                <label for="img" class="text-light rounded px-2 text-center  py-1 d-block
                                bg-success">Select and Preview Image Here</label>
                                @error('post_img')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <!-- ========== End Image ========== -->

                            <!-- ========== Start Title ========== -->
                            <div class="mb-3">
                                <label for="title" class="form-label text-muted">Title:</label>
                                <input type="text" class="form-control shadow-none" name="post_title"
                                    placeholder="Post Title" style="70px" value="{{ old('post_title') }}">
                                @error('post_title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <!-- ========== End Title ========== -->

                            <!-- ========== Start Section ========== -->

                            <div class="mb-3">
                                <label for="para" class="form-label">Content:</label>
                                <textarea type="text" class="form-control shadow-none" name="post_description" rows="3"
                                    placeholder=" ">{{ old('post_description') }}</textarea>
                                @error('post_description')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <!-- ========== End Section ========== -->

                            <!-- ========== Start Category ========== -->
                            <div class="mb-3">
                                <label for="">Categories</label>
                                <select name="post_category" class="form-select">
                                    <option value="#" class="text-muted" selected hidden disabled> - Choice
                                        Category
                                    </option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('post_category')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <!-- ========== End Category ========== -->


                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-bs-dismiss="modal">Cancle</button>
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- ========== End Dialog Add Content Box ========== -->



    </div><!-- .animated -->
</div>
@endsection

@section('script-content')
<script>
    $(document).ready(() => {

            $('.delete_btn').click(function() {
                $btn = $(this).find('input')
                $id= $btn.val();
                $parent = $(this).parents('.card');

                const ajaxFun = () =>{
                    $.ajax({
                        type:'get',
                        url:'/admin/post/delete',
                        data:{'id':$id},
                        dataType:'json',
                        success: function(res) {
                            console.log(res.status);
                            if (res.status == true) {
                                $parent.remove();
                                console.log('ok');
                            }
                        }
                    })
                } // ------ajax end

                // sweetalert

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this Article!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            ajaxFun()
                            swal("Now, Your Article has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your Article is safe!");
                        }
                        });

                // sweetalert end


            })

        })


</script>

</script>
@endsection