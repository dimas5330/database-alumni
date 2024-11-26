@extends('pages.user.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelola Data Pribadi</h1>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pribadi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Richard Adi Setianto">
                            </div>
                            <div class="section-title mt-0">Jenis Kelamin</div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Laki - Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Semarang">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir 2</label>
                                <input type="date" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Golongan Darah</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="50" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="100" class="selectgroup-input">
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="150" class="selectgroup-input">
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="200" class="selectgroup-input">
                                        <span class="selectgroup-button">O</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control phone-number" placeholder="085743156853">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Tempat Tinggal</label>
                                <input type="text" class="form-control" placeholder="Jln. Raden Sambung No. 45">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                                <label>Angkatan Lulus SMA</label>
                                <input type="text" class="form-control" placeholder="2015">
                            </div>
                            <div class="form-group">
                                <label>Nama Sekolah/Kampus</label>
                                <input type="text" class="form-control" placeholder="SMAN 1 Semarang">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Perawat">
                            </div>
                            <div class="form-group">
                                <label>Nama Kantor</label>
                                <input type="text" class="form-control" placeholder="PT. Abdi Sentosa">
                            </div>
                            <div class="form-group">
                                <label>Alamat Kantor</label>
                                <input type="text" class="form-control" placeholder="Jln. Singkong No.86">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-12 mb-4"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Publish</button>
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
