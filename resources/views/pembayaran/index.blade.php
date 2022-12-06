@extends('pembayaran.layout')
@section('content')
<h4 class="mt-5">Data pembayaran</h4>
<a href="{{ route('pembayaran.create') }}" type="button" 
class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
 <div class="alert alert-success mt-3" role="alert">
 {{ $message }}
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>Id_pembayaran</th>
 <th>jumlah</th>
 <th>status_pembayaran</th>
 <th>tgl_pembayaran</th>
 <th>batas_tgl_pembayaran</th>
 <th>Id_rute</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datas as $data)
 <tr>
 <td>{{ $data->Id_pembayaran }}</td>
 <td>{{ $data->jumlah }}</td>
 <td>{{ $data->status_pembayaran }}</td>
 <td>{{ $data->tgl_pembayaran }}</td>
 <td>{{ $data->batas_tgl_pembayaran }}</td>
 <td>{{ $data->Id_rute }}</td>
 <td>
 <a href="{{ route('pembayaran.edit', $data->Id_pembayaran) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->Id_pembayaran }}">
 Hapus
 </button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->Id_pembayaran }}" tabindex="-1" 
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
action="{{ route('pembayaran.delete', $data->Id_pembayaran) }}">
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