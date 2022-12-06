@extends('rute.layout')
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
route('rute.store') }}">
            @csrf
            <div class="mb-3">
                <label for="Id_rute" class="form-label">ID rute</label>
                <input type="text" class="form-control" id="Id_rute" name="Id_rute">
            </div>
            <div class="mb-3">
                <label for="Kota_asal" class="form-label">Kota_asal</label>
                <input type="text" class="form-control" id="Kota_asal" name="Kota_asal">
            </div>
            <div class="mb-3">
                <label for="Kota_tujuan" class="form-label">Kota_tujuan</label>
                <input type="text" class="form-control" id="Kota_tujuan" name="Kota_tujuan">
            </div>
            <div class="mb-3">
                <label for="Waktu_tiba" class="form-label">Waktu_tiba</label>
                <input type="time" class="form-control" id="Waktu_tiba" name="Waktu_tiba">
            </div>
            <div class="mb-3">
                <label for="Sisa_kapasitas" class="form-label">Sisa_kapasitas</label>
                <input type="text" class="form-control" id="Sisa_kapasitas" name="Sisa_kapasitas">
            </div>
            <div class="mb-3">
                <label for="Kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="Kelas" name="Kelas">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="Harga" name="Harga">
            </div>
            <div class="mb-3">
                <label for="Id_maskapai" class="form-label">Id_maskapai</label>
                <input type="text" class="form-control" id="Id_maskapai" name="Id_maskapai">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop