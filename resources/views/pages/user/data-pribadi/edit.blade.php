@extends('pages.user.layouts.app')
@include('sweetalert::alert')

@section('title', 'Edit Data Pribadi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
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
                <h1>Form Edit Data Pribadi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('user.dashboard') }}">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Pribadi</h2>

                <div class="card p-4">
                    <form action="{{ route('userdatapribadi.update', $dataPribadi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="required-field">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $dataPribadi->nama_lengkap) }}">
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
                                    <input type="radio" name="jenis_kelamin" value="Laki - Laki" class="selectgroup-input" {{ old('jenis_kelamin', $dataPribadi->jenis_kelamin) == 'Laki - Laki' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Laki - Laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" {{ old('jenis_kelamin', $dataPribadi->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="required-field">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $dataPribadi->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dataPribadi->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Golongan Darah</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="A" class="selectgroup-input" {{ old('goldar', $dataPribadi->goldar) == 'A' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">A</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="B" class="selectgroup-input" {{ old('goldar', $dataPribadi->goldar) == 'B' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">B</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input" {{ old('goldar', $dataPribadi->goldar) == 'AB' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">AB</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="O" class="selectgroup-input" {{ old('goldar', $dataPribadi->goldar) == 'O' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">O</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="required-field">Alamat Tinggal Sekarang</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $dataPribadi->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Angkatan</label>
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan', $dataPribadi->angkatan) }}">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Nama Sekolah / Universitas</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{ old('nama_sekolah', $dataPribadi->nama_sekolah) }}">
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="required-field">Pendidikan Terakhir</label>
                            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $dataPribadi->pendidikan_terakhir) }}">
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas', $dataPribadi->fakultas) }}">
                            @error('fakultas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan', $dataPribadi->jurusan) }}">
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan', $dataPribadi->pekerjaan) }}">
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Profesi</label>
                            <input type="text" class="form-control @error('profesi') is-invalid @enderror" name="profesi" value="{{ old('profesi', $dataPribadi->profesi) }}">
                            @error('profesi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Kantor</label>
                            <input type="text" class="form-control @error('nama_kantor') is-invalid @enderror" name="nama_kantor" value="{{ old('nama_kantor', $dataPribadi->nama_kantor) }}">
                            @error('nama_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" value="{{ old('alamat_kantor', $dataPribadi->alamat_kantor) }}">
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
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
