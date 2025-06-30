@extends('pages.user.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .card-header h5 {
            text-align: center
        }

        /* CSS untuk membuat semua card sama ukuran */
        .card-statistic-1 {
            height: 100px !important;
            display: flex;
            flex-direction: column;
        }

        .card-statistic-1 .card-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-statistic-1 .card-header {
            margin: 15px 0 !important;
            flex-shrink: 0;
        }

        .card-statistic-1 .card-body {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-statistic-1 .card-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-statistic-1 .card-icon i {
            font-size: 40px;
        }

        /* Efek hover untuk card */
        .card-statistic-1:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Pengguna</h1>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Tambahkan div row untuk membungkus cards -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Isi Data Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapribadi.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Isi Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatakeluarga.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Isi Data Pelayanan</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapelayanan.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
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