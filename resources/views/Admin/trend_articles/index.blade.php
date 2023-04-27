@extends('Admin.Layouts.admin-master')


@section('title', 'Trend-Articles')


@section('dashboard-content')
<h3 class="text-muted"> Trending Articles</h3>

<div class="container my-3">
    <div class=" d-flex justify-content-end" style="height:50px">
        {{-- {{ $posts->links() }} --}}
    </div>

    <div class="row">
        @foreach ($posts as $post )
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="px-2 bg-light text-muted">{{ $post->title }}

                        </h4>



                        <!-- ========== Start Nav Setting ========== -->
                        <div class="user-area dropdown float-right" alt="Setting">

                            <span class="text-muted">
                                <i class="fa fa-eye ms-4" aria-hidden="true"></i> {{ $post->post_count }}
                            </span>

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{-- <i class="fa-solid fa-gear fa-spin px-0"></i> --}}
                                <i class="fa fa-cog fa-spin px-0" style="font-size: 15px"></i>
                            </a>

                            <div class="user-menu dropdown-menu shadow rounded">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-bell fa-shake text-info"></i> Notification
                                </a>
                                <a class="nav-link" href="{{ route('admin@trend_detail',$post->id) }}">
                                    <i class="fa-solid fa-circle-info text-secondary"></i> Detail
                                </a>


                            </div>
                        </div>
                        <!-- ========== End Nav Setting ========== -->

                    </div>
                </div>

                <a class="image" href="{{ route('admin@trend_detail',$post->id) }}">
                    <img src="{{ asset('Storage/Post/'.$post->image) }}"
                        style="height:150px; object-fit:contain; width:100%">
                </a>

                <div class="card-body">
                    <div class="title">
                        <span class="text-muted small">Date:
                            {{ $post->created_at->format('i/ M/ Y')}} |
                        </span>
                        <span class="text-muted small">{{ $post->created_at->diffForHumans() }}</span>
                        <span class="text-muted d-block small">Author: {{ $post->user_name }}</span>
                        <span class="h6 small text-muted">Category: {{ $post->category_name }}</span>
                        {{--
                        <hr class=" bg-dark"> --}}
                    </div>
                    {{-- <div class="pb-3" style="height:100px; overflow:hidden">
                        <p>{{ $post->description }}</p>
                    </div> --}}
                </div>
            </div>

        </div>

        @endforeach
    </div>




</div>


@endsection