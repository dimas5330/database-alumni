@extends('pages.user.layouts.app')

@section('title', 'Add User')

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



                <div class="card">
                    <form action="{{ route('userdatapribadi.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name"
                                    value="{{ Auth::user()->name }}" readonly>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_kelamin" value="Pria" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Pria</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_kelamin" value="Wanita" class="selectgroup-input">
                                        <span class="selectgroup-button">Wanita</span>
                                    </label>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text"
                                        class="form-control @error('tempat_lahir')
                                    is-invalid
                                @enderror"
                                        name="tempat_lahir">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Date &amp; Time Picker</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="d-block">Date Range Picker With Button</label>
                                        <a href="javascript:;"
                                            class="btn btn-primary daterange-btn icon-left btn-icon"><i
                                                class="fas fa-calendar"></i> Choose Date
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Picker</label>
                                        <input type="text"
                                            class="form-control datepicker">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Time Picker</label>
                                        <input type="text"
                                            class="form-control datetimepicker">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Range Picker</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control daterange-cus">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Time Picker</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control timepicker">
                                        </div>
                                    </div>
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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
