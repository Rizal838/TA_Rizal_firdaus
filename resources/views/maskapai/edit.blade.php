@extends('maskapai.layout')
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
 <h5 class="card-title fw-bolder mb-3">Ubah Data Pelanggan</h5>
<form method="post" action="{{ 
route('maskapai.update', $data->Id_maskapai) }}">
@csrf
 <div class="mb-3">
 <label for="id_maskapai" class="form-label">ID maskapai</label>
 <input type="text" class="form-control" 
id="Id_maskapai" name="Id_maskapai" value="{{ $data->Id_maskapai }}">
 </div>
<div class="mb-3">
 <label for="Nama_maskapai" class="form-label">Nama maskapai</label>
 <input type="text" class="form-control" 
id="Nama_pelanggan" name="Nama_maskapai" value="{{ $data->Nama_maskapai}}">
 </div>
 
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Ubah" />
</div>
</form>
</div>
</div>
@stop
