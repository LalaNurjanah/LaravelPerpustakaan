<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data buku',
            'data'       => $buku
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
            'id_buku' => 'required|unique:anggota|max:255',
            'judul_buku' =>'required',
            'deskripsi' =>'required',
            'kategori' => 'required',
            'cover_img' =>'required',
        ]);

        $buku = Buku::create([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'deskripsi'=> $request->deskripsi,
            'kategori' => $request->kategori,
            'cover_img'=> $request->cover_img,
            'kategori_id'=> $request->kategori_id,
            
        ]);
            if ($buku) {
                return response()->json([
                    'success' => true,
                    'message'    => 'buku Berhasil di tambahkan',
                    'data'       => $buku
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'buku Gagal Ditambahkan ',
                    'data'       => $buku
                ], 409); 
            }
    }
    public function show ($id)
    {
        $buku = Buku::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data buku ',
            'data'       => $buku
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $buku = Buku::find($id)->update([
                'id_buku' => $request->id_buku,
                'judul_buku' => $request->judul_buku,
                'deskripsi'=> $request->deskripsi,
                'kategori' => $request->kategori,
                'cover_img'=> $request->cover_img,
                'kategori_id'=> $request->kategori_id,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data buku telah berhasil di rubah',
                'data'    => $buku
            ], 200);
        }
        public function destroy($id)
        {
            $buku = Buku::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data buku berhasil di hapus',
                'data'    => $buku
            ], 200);
        }
        
    }
