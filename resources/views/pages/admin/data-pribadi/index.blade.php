@extends('pages.admin.layouts.app')
@include('sweetalert::alert')

@section('title', 'Kelola Data Pribadi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelola Data Pribadi</h1>
                <div class="section-header-button">
                    <a href="{{ route('dataPribadi.create') }}" class="btn btn-primary">Tambahkan</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dataPribadi.index') }}">Kelola Data Pribadi</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('pages.admin.layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Daftar Data Pribadi</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('dataPribadi.index') }}">
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
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Golongan Darah</th>
                                            <th>Phone</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Angkatan</th>
                                            <th>Nama Sekolah</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Fakultas</th>
                                            <th>Jurusan</th>
                                            <th>Pekerjaan</th>
                                            <th>Profesi</th>
                                            <th>Nama Kantor</th>
                                            <th>Alamat Kantor</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($dataPribadi as $dataPribadis)
                                            <tr>

                                                <td>{{ $dataPribadis->nama_lengkap }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->jenis_kelamin }}
                                                </td>
                                                <td>{{ $dataPribadis->tempat_lahir }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->tanggal_lahir->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->goldar }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->user->phone }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->alamat }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->user->email }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->angkatan }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->nama_sekolah }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->pendidikan_terakhir }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->fakultas }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->jurusan }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->pekerjaan }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->profesi }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->nama_kantor }}
                                                </td>
                                                <td>
                                                    {{ $dataPribadis->alamat_kantor }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('dataPribadi.edit', $dataPribadis->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('dataPribadi.destroy', $dataPribadis->id) }}"
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
                                    {{ $dataPribadi->withQueryString()->links() }}
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
