@extends('pelanggan.layout')
@section('content')
<h4 class="mt-5">Data pelanggan</h4>
<a href="{{ route('pelanggan.create') }}" type="button" 
class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('pelanggan.trash') }}" type="button" 
class="btn btn-success rounded-3">Trash</a>
<div class="form-search" style="float:right">
    <form action="{{ route('pelanggan.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Nama pelanggan">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
@if($message = Session::get('success'))
 <div class="alert alert-success mt-3" role="alert">
 {{ $message }}
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>Id_pelanggan</th>
 <th>Nama_pelanggan</th>
 <th>No_telp</th>
 <th>Usia</th>
 <th>tgl_pemesanan</th>
 <th>keterangan</th>
 <th>tgl_berangkat</th>
 <th>Id_pembayaran</th>
 <th>Action</th>

 </tr>
 </thead>
 <tbody>
 @foreach ($datas as $data)
 <tr>
 <td>{{ $data->Id_pelanggan }}</td>
 <td>{{ $data->Nama_pelanggan }}</td>
 <td>{{ $data->No_telp }}</td>
 <td>{{ $data->Usia }}</td>
 <td>{{ $data->tgl_pemesanan }}</td>
 <td>{{ $data->keterangan }}</td>
 <td>{{ $data->tgl_berangkat }}</td>
 <td>{{ $data->Id_pembayaran }}</td>
 <td>
 <a href="{{ route('pelanggan.edit', $data->Id_pelanggan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->Id_pelanggan }}">
 Hapus
 </button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->Id_pelanggan }}" tabindex="-1" 
aria-labelledby="hapusModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('pelanggan.hide', $data->Id_pelanggan) }}">
 @csrf
<div class="modal-body">
 Apakah anda yakin ingin menghapus data ini?
 </div>
 <div class="modal-footer">
 <button 
type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button 
type="submit" class="btn btn-primary">Ya</button>
 </div>
 </form>
 </div>
 </div>
 </div>
 </td>
 </tr>
 @endforeach
 </tbody>
</table>
@stop