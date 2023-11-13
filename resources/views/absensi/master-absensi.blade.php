@extends('layout/main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Absensi Pegawai</h1>
    </div>
    <div class="body-white border rounded shadow">
        <div class="container mt-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <form action="/dashboard/database/mahasiswa">
                        <div class="input-group">
                            <input type="search" id="search" name="search" class="form-control"
                                placeholder="Cari Pegawai" value="{{ request('search') }}" />
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="div table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Divisi</th>
                            <th>Tanggal</th>
                            <th>Waktu Absensi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAbsensi as $item)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $item->pegawai_id }}</td>
                                <td>{{ $item->pegawai->nama_pegawai }}</td>
                                <td>{{ $item->pegawai->divisi }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->waktu_absensi }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection