@extends('pages.user.layouts.app')

@section('title', 'Isi Data Pribadi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Isi Data Pribadi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('user.dashboard') }}">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Isi Data Pribadi</h2>



                <div class="card p-4">
                    <form action="{{ route('userdatapribadi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki - Laki" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Laki - Laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input">
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Golongan Darah</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="A" class="selectgroup-input">
                                    <span class="selectgroup-button">A</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="B" class="selectgroup-input">
                                    <span class="selectgroup-button">B</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input">
                                    <span class="selectgroup-button">AB</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="O" class="selectgroup-input">
                                    <span class="selectgroup-button">O</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tinggal Sekarang</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah / Universitas</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah">
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir">
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas">
                            @error('fakultas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan">
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Kantor</label>
                            <input type="text" class="form-control @error('nama_kantor') is-invalid @enderror" name="nama_kantor">
                            @error('nama_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor">
                            @error('alamat_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endpush
