<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pembayarancontroller extends Controller
{
   

    public function create() {
        return view('pembayaran.add');
        }
        public function store(Request $request) {
        $request->validate([
        'Id_pembayaran' => 'required',
        'jumlah' => 'required',
        'status_pembayaran' => 'required',
        'tgl_pembayaran' => 'required',
        'batas_tgl_pembayaran' => 'required',
        'Id_rute' => 'required',
        ]);
        
        DB::insert('INSERT INTO pembayaran(Id_pembayaran, jumlah, status_pembayaran, tgl_pembayaran, batas_tgl_pembayaran,Id_rute) VALUES 
       (:Id_pembayaran, :jumlah, :status_pembayaran, :tgl_pembayaran, :batas_tgl_pembayaran, :Id_rute)',
        [
        
        'Id_pembayaran' => $request->Id_pembayaran,
        'jumlah' => $request->jumlah,
        'status_pembayaran' => $request->status_pembayaran,
        'tgl_pembayaran' => $request->tgl_pembayaran,
        'batas_tgl_pembayaran' => $request->batas_tgl_pembayaran,
        'Id_rute' => $request->Id_rute,
        ]
        );
        return redirect()->route('pembayaran.index')->with('success', 'Data Pelanggan berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from pembayaran');
            return view('pembayaran.index')
            ->with('datas', $datas);
            }
           
            public function edit($id) {
                $data = DB::table('pembayaran')->where('Id_pembayaran', 
               $id)->first();
                return view('pembayaran.edit')->with('data', $data);
                }
                public function update($id, Request $request) {
                $request->validate([
                    
                    'Id_pembayaran' => 'required',
                    'jumlah' => 'required',
                    'status_pembayaran' => 'required',
                    'tgl_pembayaran' => 'required',
                    'batas_tgl_pembayaran' => 'required',
                    'Id_rute' => 'required',
                ]);
                
                DB::update('UPDATE pembayaran SET Id_pembayaran = :Id_pembayaran, jumlah = :jumlah, status_pembayaran = :status_pembayaran, tgl_pembayaran = :tgl_pembayaran, batas_tgl_pembayaran = :batas_tgl_pembayaran, Id_rute = :Id_rute WHERE id_pembayaran = :id',
                [
                    'id' => $id,
                    'Id_pembayaran' => $request->Id_pembayaran,
                    'jumlah' => $request->jumlah,
                    'status_pembayaran' => $request->status_pembayaran,
                    'tgl_pembayaran' => $request->tgl_pembayaran,
                    'batas_tgl_pembayaran' => $request->batas_tgl_pembayaran,
                    'Id_rute' => $request->Id_rute,
                ]
                );
                return redirect()->route('pembayaran.index')->with('success', 'Data Pelanggan berhasil diubah');
                }
                public function delete($id) {
                    DB::delete('DELETE FROM pembayaran WHERE Id_pembayaran = :Id_pembayaran', ['Id_pembayaran' => $id]);
                    return redirect()->route('pembayaran.index')->with('success', 'Data Pelanggan berhasil dihapus');
                    }
                          
}


