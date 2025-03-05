@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Isi Data Pribadi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <style>
        .required-field::after {
            content: " *";
            color: red;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Isi Data Pribadi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Isi Data Pribadi</h2>

                <div class="card p-4">
                    <form action="{{ route('dataPribadi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="required-field">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki - Laki" class="selectgroup-input" {{ old('jenis_kelamin') == 'Laki - Laki' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Laki - Laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="required-field">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="form-group">
                            <label class="required-field">Golongan Darah</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="A" class="selectgroup-input" {{ old('goldar') == 'A' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">A</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="B" class="selectgroup-input" {{ old('goldar') == 'B' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">B</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input" {{ old('goldar') == 'AB' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">AB</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="O" class="selectgroup-input" {{ old('goldar') == 'O' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">O</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="required-field">Alamat Tinggal Sekarang</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Angkatan Lulus SMA</label>
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan') }}">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Nama Sekolah / Universitas</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Pendidikan Terakhir</label>
                            <select class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir">
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="Diploma" {{ old('pendidikan_terakhir') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="Sarjana" {{ old('pendidikan_terakhir') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                            </select>
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}">
                            @error('fakultas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}">
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Profesi</label>
                            <input type="text" class="form-control @error('profesi') is-invalid @enderror" name="profesi" value="{{ old('profesi') }}">
                            @error('profesi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Kantor</label>
                            <input type="text" class="form-control @error('nama_kantor') is-invalid @enderror" name="nama_kantor" value="{{ old('nama_kantor') }}">
                            @error('nama_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" value="{{ old('alamat_kantor') }}">
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
