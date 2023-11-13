@extends('layout/main')

@section('container')
    @if (session()->has('message'))
        <div class="position-fixed mt-5 top-0 end-0 p-3" style="z-index: 11">
            <div id="toastNotification" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div id="toast-header"
                    class="toast-header @if (session('status') == true) text-success @else text-danger @endif">
                    <i class="fa-solid fa-square fa-xl"></i>
                    <strong class="ms-2 me-auto">{{ session('status') == true ? 'Success' : 'Failed' }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Pegawai</h1>
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
                <div class="">
                    <a class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#tambahPegawaiModal">Tambah
                        Pegawai</a>
                </div>
            </div>
            <div class="div table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama Pegawai</th>
                            <th>Divisi</th>
                            <th>Nomor Telpon</th>
                            <th>Email</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->divisi }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->salary }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm px-3" href="pegawai/{{ $item->id }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger btn-sm px-3" id="hapusPegawai" data-bs-toggle="modal"
                                        data-bs-target="#hapusPegawaiModal" data-id="{{ $item->id }}"
                                        data-nama="{{ $item->nama_pegawai }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Pegawai --}}
    <div class="modal fade" id="tambahPegawaiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="tambahPegawaiModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="pegawai" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="id" id="id_pegawai" type="text" placeholder="ID" />
                            <label for="ID">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama_pegawai" id="nama_pegawai" type="text"
                                placeholder="nama_pegawai" />
                            <label for="nama_pegawai">Nama Pegawai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="divisi" id="divisi" required>
                                <option value="default" selected disabled hidden>Pilih Divisi</option>
                                <option value="1">Developer</option>
                                <option value="2">Accounting</option>
                                <option value="3">Human Resource</option>
                            </select>
                            <label for="divisi">Divisi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" id="phone" type="tel" placeholder="phone"
                                pattern="[0-9]{4}[0-9]{4}[0-9]{4}" maxlength="12" />
                            <label for="phone">Nomor Telpon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email"
                                placeholder="email" />
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="salary" id="salary" type="number"
                                placeholder="salary" />
                            <label for="salary">Salary</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Delete Pegawai --}}
    <div class="modal fade" id="hapusPegawaiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editPegawaiModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="pegawai" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="id" id="id_hapus" type="text" placeholder="ID"
                                readonly />
                            <label for="ID">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" id="nama_hapus" type="text"
                                placeholder="Nama_Pegawai" readonly />
                            <label for="Nama_Pegawai">Nama_Pegawai</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('../script/pegawai-script')
@endsection
