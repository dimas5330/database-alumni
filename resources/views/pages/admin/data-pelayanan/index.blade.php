@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Kelola Data Pelayanan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelola Data Pelayanan</h1>
                <div class="section-header-button">
                    <a href="{{ route('dataPelayanan.create') }}" class="btn btn-primary">Tambahkan</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dataPelayanan.index') }}">Kelola Data Pelayanan</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('pages.admin.layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Daftar Data Pelayanan</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('dataPelayanan.index') }}">
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
                                            <th>Pelayanan Perkantas</th>
                                            <th>Waktu & Jabatan Pelayanan Perkantas</th>
                                            <th>Nama Gereja</th>
                                            <th>Pelayanan Sekarang</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($dataPelayanan as $data)
                                            <tr>

                                                <td>{{ $data->nama_lengkap }}
                                                </td>
                                                <td>
                                                    {{ $data->pelayanan_perkantas }}
                                                </td>
                                                <td>{{ $data->jabatan_pelayanan }}</td>
                                                </td>
                                                <td>
                                                    {{ $data->nama_gereja }}
                                                </td>
                                                <td>
                                                    {{ $data->pelayanan_sekarang }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('dataPelayanan.edit', $data->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('dataPelayanan.destroy', $data->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $dataPelayanan->withQueryString()->links() }}
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
