@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Dashboard Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .chart-container {
            width: 100%;
            overflow-x: auto;
        }
        .chart-container canvas {
            min-width: 1000px; /* Adjust this width as needed */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Alumni</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalDataPribadi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Alumni Berdasarkan Tahun Angkatan</h4>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                            <canvas id="angkatanChart" height="182"></canvas>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('angkatanChart').getContext('2d');
            var angkatanData = @json($alumniData);

            var labels = angkatanData.map(function(item) {
                return item.angkatan;
            });

            var data = angkatanData.map(function(item) {
                return item.total;
            });

            var angkatanChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Alumni',
                        data: data,
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(63,82,227,.8)',
                        borderWidth: 2.5,
                        pointBackgroundColor: 'transparent',
                        pointBorderColor: 'transparent',
                        pointRadius: 4
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
