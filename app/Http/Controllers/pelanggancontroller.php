<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pelanggancontroller extends Controller
{
    public function create() {
        return view('pelanggan.add');
        }
        public function store(Request $request) {
        $request->validate([
        'Id_pelanggan' => 'required',
        'Nama_pelanggan' => 'required',
        'No_telp' => 'required',
        'Usia' => 'required',
        'tgl_pemesanan' => 'required',
        'keterangan' => 'required',
        'tgl_berangkat' => 'required',
        'Id_pembayaran' => 'required',
        ]);
        
        DB::insert('INSERT INTO pelanggan(Id_pelanggan, Nama_pelanggan, No_telp, Usia, tgl_pemesanan, keterangan, tgl_berangkat,Id_pembayaran) VALUES 
       (:Id_pelanggan, :Nama_pelanggan, :No_telp, :Usia, :tgl_pemesanan, :keterangan, :tgl_berangkat, :Id_pembayaran)',
        [
        'Id_pelanggan' => $request->Id_pelanggan,
        'Nama_pelanggan' => $request->Nama_pelanggan,
        'No_telp' => $request->No_telp,
        'Usia' => $request->Usia,
        'tgl_pemesanan' => $request->tgl_pemesanan,
        'keterangan' => $request->keterangan,
        'tgl_berangkat' => $request->tgl_berangkat,
        'Id_pembayaran' => $request->Id_pembayaran,

        ]
        );
        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from pelanggan where deleted_at is null');
            return view('pelanggan.index')
            ->with('datas', $datas);
            }
            public function hide($id)
            {
                DB::update('UPDATE pelanggan SET deleted_at=current_timestamp() WHERE Id_pelanggan = :Id_pelanggan', ['Id_pelanggan' => $id]);
                return redirect()->route('pelanggan.index')->with('success', 'Data Customer berhasil dihapus');
            }   
            public function trash()
            {
                $datas = DB::select('select * from pelanggan where deleted_at is not null');
                return view('pelanggan.trash')
                    ->with('datas', $datas);
            }
            public function restore($id)
    {
        DB::update('UPDATE pelanggan SET deleted_at=null WHERE Id_pelanggan = :Id_pelanggan', ['Id_pelanggan' => $id]);
        return redirect()->route('pelanggan.trash');
    }
            public function edit($id) {
                $data = DB::table('pelanggan')->where('Id_pelanggan', 
               $id)->first();
                return view('pelanggan.edit')->with('data', $data);
                }
                public function update($id, Request $request) {
                $request->validate([
                    'Id_pelanggan' => 'required',
                    'Nama_pelanggan' => 'required',
                    'No_telp' => 'required',
                    'Usia' => 'required',
                    'tgl_pemesanan' => 'required',
                    'keterangan' => 'required',
                    'tgl_berangkat' => 'required',
                    'Id_pembayaran' => 'required',
                ]);
                
                DB::update('UPDATE pelanggan SET Id_pelanggan = :Id_pelanggan, Nama_pelanggan = :Nama_pelanggan, No_telp = :No_telp, Usia = :Usia, tgl_pemesanan = :tgl_pemesanan, keterangan = :keterangan, tgl_berangkat= :tgl_berangkat, Id_pembayaran= :Id_pembayaran WHERE id_pelanggan = :id',
                [
                    'id' => $id,
                    'Id_pelanggan' => $request->Id_pelanggan,
                    'Nama_pelanggan' => $request->Nama_pelanggan,
                    'No_telp' => $request->No_telp,
                    'Usia' => $request->Usia,
                    'tgl_pemesanan' => $request->tgl_pemesanan,
                    'keterangan' => $request->keterangan,
                    'tgl_berangkat' => $request->tgl_berangkat,
                    'Id_pembayaran' => $request->Id_pembayaran,
                ]
                );
                return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil diubah');
                }
                public function delete($id) {
                    DB::delete('DELETE FROM pelanggan WHERE Id_pelanggan = :Id_pelanggan', ['Id_pelanggan' => $id]);
                    return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil dihapus');
                    }
                    public function search(Request $request)
                    {
                        $get_nama = $request->nama;
                        $datas = DB::table('pelanggan')->where('deleted_at', NULL )->where('nama_pelanggan', 'LIKE', '%'.$get_nama.'%')->get();
                        return view('pelanggan.index')->with('datas', $datas);
                    }
                    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('customer')->where('deleted_at', '<>', '' )->where('nama', 'LIKE', '%'.$get_nama.'%')->get();
        return view('customer.trash')
        ->with('datas', $datas);
    }
                          
}
