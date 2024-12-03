@extends('pages.user.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .card-header h5 {
            text-align: center
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Pengguna</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="margin: 15px 0;">
                                <h5>Edit Data Akun</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userprofile.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="margin: 15px 0;">
                                <h5>Isi Data Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapribadi.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="margin: 15px 0;">
                                <h5>Isi Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatakeluarga.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header text-center">
                                <h5>Isi Data Pelayanan</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapelayanan.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="margin: 15px 0;">
                                <h5>Edit Data Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapribadi.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header text-center">
                                <h5>Edit Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatakeluarga.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header text-center">
                                <h5 class="text-center">Edit Data Pelayanan</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapelayanan.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
