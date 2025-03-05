@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Edit Data Pelayanan')

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
                <h1>Edit Data Pelayanan</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Pelayanan</h2>

                <div class="card p-4">
                    <form action="{{ route('dataPelayanan.update', $dataPelayanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div id="additional-forms">
                            <div class="form-group">
                                <label class="required-field">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $dataPelayanan->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required-field">Pernah Terlibat Pelayanan di Perkantas Semarang</label>
                                <input type="text" class="form-control @error('pelayanan_perkantas') is-invalid @enderror" name="pelayanan_perkantas" value="{{ old('pelayanan_perkantas', $dataPelayanan->pelayanan_perkantas) }}">
                                @error('pelayanan_perkantas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-sm-12 col-form-label required-field">Sebutkan kapan terlibat dalam pelayanan tersebut diatas dan menjabat sebagai apa?</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control @error('jabatan_pelayanan') is-invalid @enderror" data-height="150" name="jabatan_pelayanan">{{ old('jabatan_pelayanan', $dataPelayanan->jabatan_pelayanan) }}</textarea>
                                    @error('jabatan_pelayanan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="additional-forms">
                                <div class="form-group">
                                    <label class="required-field">Berjemaat di Gereja Mana?</label>
                                    <input type="text" class="form-control @error('nama_gereja') is-invalid @enderror" name="nama_gereja" value="{{ old('nama_gereja', $dataPelayanan->nama_gereja) }}">
                                    @error('nama_gereja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-sm-12 col-form-label required-field">Sebutkan keterlibatan Pelayanan saat ini, dimana dan sebagai apa?</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control @error('pelayanan_sekarang') is-invalid @enderror" data-height="150" name="pelayanan_sekarang">{{ old('pelayanan_sekarang', $dataPelayanan->pelayanan_sekarang) }}</textarea>
                                    @error('pelayanan_sekarang')
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
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
