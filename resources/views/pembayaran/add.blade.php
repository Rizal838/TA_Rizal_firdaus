@extends('pembayaran.layout')
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
route('pembayaran.store') }}">
            @csrf
            <div class="mb-3">
                <label for="Id_pembayaran" class="form-label">ID pembayaran</label>
                <input type="text" class="form-control" id="Id_pembayaran" name="Id_pembayaran">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">status_pembayaran</label>
                <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" placeholder="Cash/Kredit">
            </div>
            <div class="mb-3">
                <label for="tgl_pembayaran" class="form-label">tgl_pembayaran</label>
                <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran">
            </div>
            <div class="mb-3">
                <label for="batas_tgl_pembayaran" class="form-label">batas_tgl_pembayaran</label>
                <input type="date" class="form-control" id="batas_tgl_pembayaran" name="batas_tgl_pembayaran">
            </div>
            <div class="mb-3">
                <label for="Id_rute" class="form-label">Id_rute</label>
                <input type="text" class="form-control" id="Id_rute" name="Id_rute">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop