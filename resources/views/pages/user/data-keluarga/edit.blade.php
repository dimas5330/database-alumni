@extends('pages.user.layouts.app')

@section('title', 'Edit Data Keluarga')

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
                <h1>Form Edit Data Keluarga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('user.dashboard') }}">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Keluarga</h2>



                <div class="card p-4">
                    <form action="{{ route('userdatakeluarga.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Menikah" class="selectgroup-input" checked="" onclick="toggleForm()"
                                    {{ old('status', $dataKeluarga->status) == 'Menikah' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Menikah</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Belum Menikah" class="selectgroup-input" onclick="toggleForm()"
                                    {{ old('status', $dataKeluarga->status) == 'Belum Menikah' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Belum Menikah</span>
                                </label>
                            </div>
                        </div>

                        <div id="additional-forms">
                            <div class="form-group">
                                <label>Nama Pasangan</label>
                                <input type="text" class="form-control @error('nama_pasangan') is-invalid @enderror" name="nama_pasangan" value="{{$dataKeluarga->nama_pasangan}}">
                                @error('nama_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Pasangan</label>
                                <input type="text" class="form-control @error('pekerjaan_pasangan') is-invalid @enderror" name="pekerjaan_pasangan" value="{{$dataKeluarga->pekerjaan_pasangan}}">
                                @error('pekerjaan_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir Pasangan</label>
                                <input type="text" class="form-control @error('tempatlahir_pasangan') is-invalid @enderror" name="tempatlahir_pasangan" value="{{$dataKeluarga->tempatlahir_pasangan}}">
                                @error('tempatlahir_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Pasangan</label>
                                <input type="text" class="form-control datepicker" name="tanggallahir_pasangan" value="{{$dataKeluarga->tanggallahir_pasangan}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Golongan Darah Pasangan</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="A" class="selectgroup-input" checked=""
                                        {{ old('goldar_pasangan', $dataKeluarga->goldar_pasangan) == 'A' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="B" class="selectgroup-input"
                                        {{ old('goldar_pasangan', $dataKeluarga->goldar_pasangan) == 'B' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="AB" class="selectgroup-input"
                                        {{ old('goldar_pasangan', $dataKeluarga->goldar_pasangan) == 'AB' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="O" class="selectgroup-input"
                                        {{ old('goldar_pasangan', $dataKeluarga->goldar_pasangan) == 'O' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">O</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <input type="text" class="form-control @error('nama_anak') is-invalid @enderror" name="nama_anak" value="{{$dataKeluarga->nama_anak}}">
                                @error('nama_anak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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

    <script>
        function toggleForm() {
            var status = document.querySelector('input[name="status"]:checked').value;
            var additionalForms = document.getElementById('additional-forms');
            if (status === 'Belum Menikah') {
                additionalForms.style.display = 'none';
            } else {
                additionalForms.style.display = 'block';
            }
        }

        // Panggil fungsi saat halaman dimuat untuk mengatur visibilitas awal
        document.addEventListener('DOMContentLoaded', function() {
            toggleForm();
        });
    </script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
