@extends('rute.layout')
@section('content')
<h4 class="mt-5">rute</h4>
<a href="{{ route('rute.create') }}" type="button" 
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
 <th>Id_rute</th>
 <th>Kota_asal</th>
 <th>Kota_tujuan</th>
 <th>Waktu_tiba</th>
 <th>Sisa_kapasitas</th>
 <th>Kelas</th>
 <th>Harga</th>
 <th>Id_maskapai</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datas as $data)
 <tr>
 <td>{{ $data->Id_rute }}</td>
 <td>{{ $data->Kota_asal }}</td>
 <td>{{ $data->Kota_tujuan }}</td>
 <td>{{ $data->Waktu_tiba }}</td>
 <td>{{ $data->Sisa_kapasitas }}</td>
 <td>{{ $data->Kelas }}</td>
 <td>{{ $data->Harga }}</td>
 <td>{{ $data->Id_maskapai }}</td>
 <td>
 <a href="{{ route('rute.edit', $data->Id_rute) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->Id_rute }}">
 Hapus
 </button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->Id_rute }}" tabindex="-1" 
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
action="{{ route('rute.delete', $data->Id_rute) }}">
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