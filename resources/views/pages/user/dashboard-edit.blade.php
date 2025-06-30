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
        
        /* CSS untuk membuat semua card sama ukuran */
        .card-statistic-1 {
            height: 100px !important;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
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
            color: white;
        }
        
        /* Efek hover untuk card */
        .card-statistic-1:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-statistic-1 {
                height: 180px !important;
            }
            
            .card-statistic-1 .card-icon {
                width: 60px;
                height: 60px;
            }
            
            .card-statistic-1 .card-icon i {
                font-size: 30px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Pengguna - Edit Data</h1>
            </div>
            
            <!-- Row pertama dengan 3 card -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Edit Data Akun</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userprofile.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Edit Data Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapribadi.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Edit Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatakeluarga.edit')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Row kedua untuk card tambahan -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h5>Edit Data Pelayanan</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{route('userdatapelayanan.edit')}}" class="stretched-link"></a>
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