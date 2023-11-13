@extends('layout/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Pegawai</h1>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-sm-4">
                <div class="body-white border rounded shadow py-4 px-3">
                    <form action="/pegawai" method="POST">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="id" id="id_pegawai" type="text" placeholder="ID" value="{{ $data->id }}" readonly/>
                                <label for="ID">ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nama_pegawai" id="nama_pegawai" type="text"
                                    placeholder="nama_pegawai" value="{{ $data->nama_pegawai }}" />
                                <label for="nama_pegawai">Nama Pegawai</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="divisi" id="divisi" required>
                                    <option value="Developer" @if ($data->divisi == "Developer") selected @endif>Developer</option>
                                    <option value="Accounting" @if ($data->divisi == "Accounting") selected @endif>Accounting</option>
                                    <option value="Human Resource" @if ($data->divisi == "Human Resource") selected @endif>Human Resource</option>
                                </select>
                                <label for="divisi">Divisi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="phone"
                                    pattern="[0-9]{4}[0-9]{4}[0-9]{4}" maxlength="12" value="{{ $data->phone }}" />
                                <label for="phone">Nomor Telpon</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email"
                                    placeholder="email" value="{{ $data->email }}" />
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="salary" id="salary" type="number"
                                    placeholder="salary" value="{{ $data->salary }}" />
                                <label for="salary">Salary</label>
                            </div>
                        </div>
                        <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Kembali</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
