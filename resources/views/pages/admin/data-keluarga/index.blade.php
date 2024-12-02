@extends('pages.admin.layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('pages.admin.layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Users</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('dataKeluarga.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search"
                                                value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Nama Suami / Istri</th>
                                            <th>Pekerjaan Suami / Istri</th>
                                            <th>Tempat Lahir Suami / Istri</th>
                                            <th>Tanggal Lahir Suami / Istri</th>
                                            <th>Golongan Darah Suami / Istri</th>
                                            <th>Nama Anak - Anak</th>
                                        </tr>
                                        @foreach ($dataKeluarga as $data)
                                            <tr>

                                                <td>{{ $data->user->name }}
                                                </td>
                                                <td>
                                                    {{ $data->status }}
                                                </td>
                                                <td>{{ $data->nama_pasangan }}</td>
                                                </td>
                                                <td>
                                                    {{ $data->pekerjaan_pasangan }}
                                                </td>
                                                <td>
                                                    {{ $data->tempatlahir_pasangan }}
                                                </td>
                                                <td>
                                                    {{ $data->tanggallahir_pasangan }}
                                                </td>
                                                <td>
                                                    {{ $data->goldar_pasangan }}
                                                </td>
                                                <td>
                                                    {{ $data->nama_anak }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $dataKeluarga->withQueryString()->links() }}
                                </div>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush