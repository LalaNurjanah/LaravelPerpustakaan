<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::with('buku')->whereHas('buku')->get();

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data anggota',
            'data'       => $anggota
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|unique:anggota|max:255',
            'jenis_kelamin' => 'required',
             'alamat' => 'required',
             'email' => 'required',
            'no_telp' =>'required|numeric',
           
        ]);

        $anggota = Anggota::create([
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
             'alamat'=> $request->alamat,
             'email' => $request->email,
            'no_telp' => $request->no_telp,
           
            'buku_id'=> $request->buku_id,
            
        ]);
            if ($anggota) {
                return response()->json([
                    'success' => true,
                    'message'    => 'anggota Berhasil di tambahkan',
                    'data'       => $anggota 
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'anggota Gagal Ditambahkan ',
                    'data'       => $anggota 
                ], 409); 
            }
    }
    public function show ($id)
    {
        $ang = Anggota::with('buku')-> where('id',$id)->get();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Anggota ',
            'data'       => $ang 
        ], 200); 
    }
    public function edit ($id)
    {
        $ang = Anggota::with('buku')-> where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Anggota ',
            'data'       => $ang 
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            
    
            $a = Anggota:: find($id)->update([
                'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
             'alamat'=> $request->alamat,
             'email' => $request->email,
            'no_telp' => $request->no_telp,
            'buku_id'=> $request->buku_id,
                
            ]);
                    return response()->json([
                        'success' => true,
                        'message'    => 'post update',
                        'data'       => $a ,
                    ], 200);
        }
        public function destroy($id)
        {
            $ang = Anggota::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data teman berhasil di hapus',
                'data'    => $ang
            ], 200);
        }
        
    }
