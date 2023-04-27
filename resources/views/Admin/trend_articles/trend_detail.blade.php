@extends('Admin.Layouts.admin-master')


@section('title', 'Trend-Article Detail')


@section('dashboard-content')
<h3 class="text-muted ms-5"> Trending Article Detail</h3>

<div class="container my-3">

    <div class="row">

        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="px-2 bg-light text-muted">{{ $post->title }}
                        </h4>
                        <h5 class="text-muted">
                            <i class="fa fa-eye mx-2s" aria-hidden="true"></i> {{ $post->post_count }}
                        </h5>
                    </div>
                </div>

                <div class="image m-2 ">
                    <img src="{{ asset('Storage/Post/'.$post->image) }}" style=" object-fit:contain; width:100%">
                </div>

                <div class="card-body">
                    <div class="">
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

                    <div class="row px-3 mt-4">
                        <button class="btn btn-outline-secondary rounded shadow" onclick="history.back()">Back</button>
                    </div>
                </div>

            </div>

        </div>


    </div>




</div>


@endsection