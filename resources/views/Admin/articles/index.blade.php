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
            <div class="main">


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
                                        <a class="nav-link">
                                            <button type="button" class="edit-btn btn px-0 mx-0 py-0"
                                                data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                                                <input type="hidden" value="{{ $post->id }}">
                                                <i class="fa-regular fa-pen-to-square text-success"></i>
                                                Edit
                                            </button>

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

                        <div class="image bg-info">
                            <img src="{{ asset('Storage/Post/'.$post->image) }}"
                                style="height:220px; object-fit:fill; width:100%">
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
            </div>
            <!-- ========== End Looping ========== -->
        </div>


        <!-- ========== Start Dialog Add & Edit Content Box ========== -->

        @include('Admin.articles.add-Dialog');

        @include('Admin.articles.edit-Dialog');
        <!-- ========== End Dialog Add & Edit Content Box ========== -->



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
                $main = $('.main');

                const ajaxFun = () =>{
                    $.ajax({
                        type:'get',
                        url:'/admin/post/delete',
                        data:{'id':$id},
                        dataType:'json',
                        success: function(res) {

                            if (res.status == true) {
                                $parent.remove();
                              if(res.total == 0){
                                $main.html(`
                                <div class="text-center p-2 mt-5 rounded bg-secondary">
                                    <h2 class="text-light">There is no Articles yet</h2>
                                </div>
                                `);
                              }
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
            });

            // =-----------= Delete ENd

            $('.edit-btn').click(function(){
                $editId = $(this).find('input').val();

                $title=$('#titleInput');
                $oldImg =$('#oldImg-wrap');
                $content = $('#contextInput');
                $editUserId = $('#editUserId');
                $postEditID = $('#PostID');

                const ajaxEdit = () => {
                    $.ajax({
                        type:'get',
                        url:'/admin/post/updateDialog',
                        data: { 'id': $editId },
                        dataType:'json',
                        success:(res)=>{
                            console.log(res.postEdit);
                            $title.val(res.postEdit.title );
                            $content.html(res.postEdit.description);
                            $editUserId.val(res.postEdit.user_id);
                            $postEditID.val(res.postEdit.id);


                            $oldImg.html(
                                ` <img id="oldImg" class="mb-2" alt="" src="{{ asset('Storage/Post/${res.postEdit.image}') }}"
                                style="max-height:250px; object-fit:contain; width:100%">
                                `
                            )
                        }

                    })
                }
                ajaxEdit();

            })

        })


</script>

</script>
@endsection