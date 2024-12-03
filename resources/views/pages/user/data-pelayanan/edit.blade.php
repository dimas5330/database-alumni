@extends('pages.user.layouts.app')

@section('title', 'Edit Data Pelayanan')

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
                <h1>Form Data Pelayanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>



                <div class="card p-4">
                    <form action="{{ route('userdatapelayanan.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div id="additional-forms">
                            <div class="form-group">
                                <label>Pernah Terlibat Pelayanan di Perkantas Semarang</label>
                                <input type="text" class="form-control @error('pelayanan_perkantas') is-invalid @enderror" name="pelayanan_perkantas" value="{{$dataPelayanan->pelayanan_perkantas}}">
                                @error('pelayanan_perkantas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-sm-12 col-form-label">Sebutkan kapan terlibat dalam pelayanan tersebut diatas dan menjabat sebagai apa?</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control"
                                        data-height="150" @error('jabatan_pelayanan') is-invalid @enderror name="jabatan_pelayanan">{{ old('jabatan_pelayanan', $dataPelayanan->jabatan_pelayanan) }}</textarea>
                                    @error('jabatan_pelayanan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="additional-forms">
                                <div class="form-group">
                                    <label>Berjemaat di Gereja Mana?</label>
                                    <input type="text" class="form-control @error('nama_gereja') is-invalid @enderror" name="nama_gereja" value="{{$dataPelayanan->nama_gereja}}">
                                    @error('nama_gereja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-sm-12 col-form-label">Sebutkan keterlibatan Pelayanan saat ini, dimana dan sebagai apa?</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control"
                                        data-height="150" @error('pelayanan_sekarang') is-invalid @enderror name="pelayanan_sekarang">{{ old('pelayanan_sekarang', $dataPelayanan->pelayanan_sekarang) }}</textarea>
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
        </section>
    </div>
@endsection

@push('scripts')

    <!-- JS Libraies -->
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
