@extends('pages.admin.layouts.app')

@section('title', 'Isi Data Keluarga')

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
                <h1>Form Isi Data Keluarga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Isi Data Keluarga</h2>



                <div class="card p-4">
                    <form action="{{ route('dataKeluarga.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Menikah" class="selectgroup-input" checked="" onclick="toggleForm()">
                                    <span class="selectgroup-button">Menikah</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Belum Menikah" class="selectgroup-input" onclick="toggleForm()">
                                    <span class="selectgroup-button">Belum Menikah</span>
                                </label>
                            </div>
                        </div>

                        <div id="additional-forms">
                            <div class="form-group">
                                <label>Nama Pasangan</label>
                                <input type="text" class="form-control @error('nama_pasangan') is-invalid @enderror" name="nama_pasangan">
                                @error('nama_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Pasangan</label>
                                <input type="text" class="form-control @error('pekerjaan_pasangan') is-invalid @enderror" name="pekerjaan_pasangan">
                                @error('pekerjaan_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir Pasangan</label>
                                <input type="text" class="form-control @error('tempatlahir_pasangan') is-invalid @enderror" name="tempatlahir_pasangan">
                                @error('tempatlahir_pasangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Pasangan</label>
                                <input type="text" class="form-control datepicker" name="tanggallahir_pasangan">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Golongan Darah Pasangan</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="A" class="selectgroup-input" checked="">
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="AB" class="selectgroup-input">
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="goldar_pasangan" value="O" class="selectgroup-input">
                                        <span class="selectgroup-button">O</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <input type="text" class="form-control @error('nama_anak') is-invalid @enderror" name="nama_anak">
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
