<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class maskapaicontroller extends Controller
{
    public function create() {
        return view('maskapai.add');
        }
        public function store(Request $request) {
        $request->validate([
        'Id_maskapai' => 'required',
        'Nama_maskapai' => 'required',
        ]);
        
        DB::insert('INSERT INTO maskapai(Id_maskapai, Nama_maskapai) VALUES (:Id_maskapai, :Nama_maskapai)',
        [
        'Id_maskapai' => $request->Id_maskapai,
        'Nama_maskapai' => $request->Nama_maskapai,
        
        ]
        );
        return redirect()->route('maskapai.index')->with('success', 'Data berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from maskapai');
            return view('maskapai.index')
            ->with('datas', $datas);
            }
           
            public function edit($id) {
                $data = DB::table('maskapai')->where('Id_maskapai', 
               $id)->first();
                return view('maskapai.edit')->with('data', $data);
                }
                public function update($id, Request $request) {
                $request->validate([
                    
                    'Id_maskapai' => 'required',
                    'Nama_maskapai' => 'required',
                    
                ]);
                
                DB::update('UPDATE maskapai SET Id_maskapai = :Id_maskapai, Nama_maskapai = :Nama_maskapai WHERE id_maskapai = :id',
                [
                    'id' => $id,
                    'Id_maskapai' => $request->Id_maskapai,
                    'Nama_maskapai' => $request->Nama_maskapai,
                    
                ]
                );
                return redirect()->route('maskapai.index')->with('success', 'Data berhasil diubah');
                }
                public function delete($id) {
                    DB::delete('DELETE FROM maskapai WHERE Id_maskapai = :Id_maskapai', ['Id_maskapai' => $id]);
                    return redirect()->route('maskapai.index')->with('success', 'Data berhasil dihapus');
                    }
                          
}
