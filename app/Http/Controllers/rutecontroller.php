<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class rutecontroller extends Controller     
{
    public function create() {
        return view('rute.add');
        }
        public function store(Request $request) {
        $request->validate([
        'Id_rute' => 'required',
        'Kota_asal' => 'required',
        'Kota_tujuan' => 'required',
        'Waktu_tiba' => 'required',
        'Sisa_kapasitas' => 'required',
        'Kelas' => 'required',
        'Harga' => 'required',
        'Id_maskapai' => 'required',
        ]);
        
        DB::insert('INSERT INTO rute(Id_rute, Kota_asal, Kota_tujuan, Waktu_tiba, Sisa_kapasitas, Kelas, Harga, Id_maskapai) VALUES 
       (:Id_rute, :Kota_asal, :Kota_tujuan, :Waktu_tiba, :Sisa_kapasitas, :Kelas, :Harga, :Id_maskapai)',
        [
        'Id_rute' => $request->Id_rute,
        'Kota_asal' => $request->Kota_asal,
        'Kota_tujuan' => $request->Kota_tujuan,
        'Waktu_tiba' => $request->Waktu_tiba,
        'Sisa_kapasitas' => $request->Sisa_kapasitas,
        'Kelas' => $request->Kelas,
        'Harga' => $request->Harga,
        'Id_maskapai' => $request->Id_maskapai,
        ]
        );
        return redirect()->route('rute.index')->with('success', 'Data Pelanggan berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from rute');
            return view('rute.index')
            ->with('datas', $datas);
            }
           
            public function edit($id) {
                $data = DB::table('rute')->where('Id_rute', 
               $id)->first();
                return view('rute.edit')->with('data', $data);
                }
                public function update($id, Request $request) {
                $request->validate([
                    
                    'Id_rute' => 'required',
                    'Kota_asal' => 'required',
                    'Kota_tujuan' => 'required',
                    'Waktu_tiba' => 'required',
                    'Sisa_kapasitas' => 'required',
                    'Kelas' => 'required',
                    'Harga' => 'required',
                    'Id_maskapai' => 'required',
                ]);
                
                DB::update('UPDATE rute SET Id_rute = :Id_rute, Kota_asal = :Kota_asal, Kota_tujuan = :Kota_tujuan, Waktu_tiba = :Waktu_tiba, Sisa_kapasitas = :Sisa_kapasitas, Kelas = :Kelas, Harga = :Harga, Id_maskapai = :Id_maskapai WHERE id_rute = :id',
                [
                    'id' => $id,
                    'Id_rute' => $request->Id_rute,
                    'Kota_asal' => $request->Kota_asal,
                    'Kota_tujuan' => $request->Kota_tujuan,
                    'Waktu_tiba' => $request->Waktu_tiba,
                    'Sisa_kapasitas' => $request->Sisa_kapasitas,
                    'Kelas' => $request->Kelas,
                    'Harga' => $request->Harga,
                    'Id_maskapai' => $request->Id_maskapai,
                ]
                );
                return redirect()->route('rute.index')->with('success', 'Data Pelanggan berhasil diubah');
                }
                public function delete($id) {
                    DB::delete('DELETE FROM rute WHERE Id_rute = :Id_rute', ['Id_rute' => $id]);
                    return redirect()->route('rute.index')->with('success', 'Data Pelanggan berhasil dihapus');
                    }
                          
}
