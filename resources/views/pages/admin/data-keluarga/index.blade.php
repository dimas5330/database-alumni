@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Kelola Data Keluarga')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelola Data Keluarga</h1>
                <div class="section-header-button">
                    <a href="{{ route('dataKeluarga.create') }}" class="btn btn-primary">Tambahkan</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dataKeluarga.index') }}">Kelola Data Keluarga</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('pages.admin.layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Daftar Data Keluarga</h2>

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

                               <div class="table-responsive" style="height: 500px; overflow-y: auto;">
                                    <table class="table" style="background-color: #F2F2F2;">
                                        <thead class="sticky-header" style="position: sticky; top: 0; background-color: #2B3B8F; z-index: 10;">
                                        <tr>

                                            <th class="text-center" style="color: white">Nama</th>
                                            <th class="text-center" style="color: white">Status</th>
                                            <th class="text-center" style="color: white">Nama Suami / Istri</th>
                                            <th class="text-center" style="color: white">Pekerjaan Suami / Istri</th>
                                            <th class="text-center" style="color: white">Tempat Lahir Suami / Istri</th>
                                            <th class="text-center" style="color: white">Tanggal Lahir Suami / Istri</th>
                                            <th class="text-center" style="color: white">Golongan Darah Suami / Istri</th>
                                            <th class="text-center" style="color: white">Nama Anak - Anak</th>
                                            <th class="text-center" style="color: white">Aksi</th>
                                        </tr>
                                        </thead>
                                        @foreach ($dataKeluarga as $data)
                                            <tr>

                                                <td>{{ $data->nama_lengkap }}
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
                                                    @if($data->tanggallahir_pasangan)
                                                        {{ $data->tanggallahir_pasangan->translatedFormat('d F Y') }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data->goldar_pasangan }}
                                                </td>
                                                <td>
                                                    {{ $data->nama_anak }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('dataKeluarga.edit', $data->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('dataKeluarga.destroy', $data->id) }}"
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
