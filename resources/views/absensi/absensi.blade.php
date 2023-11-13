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
        <h1 class="h2">Absensi Pegawai</h1>

        <a class="btn btn-success" href="/absensi/master">Master Absensi</a>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-sm-4">
                <div class="body-white border rounded shadow py-4 px-3">
                    <form action="/absensi" method="POST">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="id" id="id_pegawai" type="text"
                                    placeholder="id_pegawai" required/>
                                <label for="id_pegawai">ID Pegawai</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('../script/pegawai-script')
@endsection