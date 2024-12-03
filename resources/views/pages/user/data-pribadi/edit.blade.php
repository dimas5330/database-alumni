@extends('pages.user.layouts.app')

@section('title', 'Edit Data Pribadi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
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
                <h1>Form Data Pribadi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>



                <div class="card p-4">
                    <form action="{{ route('userdatapribadi.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Pria" class="selectgroup-input"
                                        {{ old('jenis_kelamin', $dataPribadi->jenis_kelamin) == 'Pria' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Pria</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Wanita" class="selectgroup-input"
                                        {{ old('jenis_kelamin', $dataPribadi->jenis_kelamin) == 'Wanita' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Wanita</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$dataPribadi->tempat_lahir}}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" value="{{$dataPribadi->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Golongan Darah</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="A" class="selectgroup-input"
                                        {{ old('goldar', $dataPribadi->goldar) == 'A' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">A</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="B" class="selectgroup-input"
                                        {{ old('goldar', $dataPribadi->goldar) == 'B' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">B</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input"
                                        {{ old('goldar', $dataPribadi->goldar) == 'AB' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">AB</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="goldar" value="O" class="selectgroup-input"
                                        {{ old('goldar', $dataPribadi->goldar) == 'O' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">O</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tinggal Sekarang</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$dataPribadi->alamat}}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{$dataPribadi->angkatan}}">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah / Universitas</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{$dataPribadi->nama_sekolah}}">
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{$dataPribadi->pekerjaan}}">
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Kantor</label>
                            <input type="text" class="form-control @error('nama_kantor') is-invalid @enderror" name="nama_kantor" value="{{$dataPribadi->nama_kantor}}">
                            @error('nama_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" value="{{$dataPribadi->alamat_kantor}}">
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