@extends('pelanggan.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Data</h5>
        <form method="post" action="{{ 
route('pelanggan.store') }}">
            @csrf
            <div class="mb-3">
                <label for="Id_pelanggan" class="form-label">ID pelanggan</label>
                <input type="text" class="form-control" id="Id_pelanggan" name="Id_pelanggan">
            </div>
            <div class="mb-3">
                <label for="Nama_pelanggan" class="form-label">Nama pelanggan</label>
                <input type="text" class="form-control" id="Nama_pelanggan" name="Nama_pelanggan">
            </div>
            <div class="mb-3">
                <label for="No_telp" class="form-label">No_telp</label>
                <input type="text" class="form-control" id="No_telp" name="No_telp">
            </div>
            <div class="mb-3">
                <label for="Usia" class="form-label">Usia</label>
                <input type="text" class="form-control" id="Usia" name="Usia">
            </div>
            <div class="mb-3">
                <label for="tgl_pemesanan" class="form-label">tgl_pemesanan</label>
                <input type="date" class="form-control" id="tgl_pemesanan" name="tgl_pemesanan">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="tgl_berangkat" class="form-label">tgl_berangkat</label>
                <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat">
            </div>
            <div class="mb-3">
                <label for="Id_pembayaran" class="form-label">id_pembayaran</label>
                <input type="text" class="form-control" id="id_pembayaran" name="Id_pembayaran">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop