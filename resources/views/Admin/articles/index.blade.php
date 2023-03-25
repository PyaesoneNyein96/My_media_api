@extends('Admin.Layouts.admin-master')


@section('title', 'Articles')


@section('dashboard-content')
    <h4>Articles pages</h4>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article 1</h4>
                        </div>
                        <div class="gmap_unix card-body">
                            <div class="map" id="basic-map"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article 2</h4>
                        </div>
                        <div class="card-body">
                            <div id="map-2" class="map"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article 3</h4>
                        </div>
                        <div class="card-body">
                            <div id="map-2" class="map"></div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- /# row -->




        </div><!-- .animated -->
    </div>
@endsection
