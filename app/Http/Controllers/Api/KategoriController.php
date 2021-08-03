<?php

namespace App\Http\Controllers\Api;
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data kategori',
            'data'       => $kategori
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
            'kategori' => 'required|unique:buku|max:255',
            'deskripsi' =>'required',
           
        ]);

        $kategori = Kategori::create([
            'kategori' => $request->kategori,
            'deskripsi'=> $request->deskripsi,
            'transaksi_id'=> $request->transaksi_id,
            
        ]);
            if ($kategori) {
                return response()->json([
                    'success' => true,
                    'message'    => 'kategori Berhasil di tambahkan',
                    'data'       => $kategori
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'kategori Gagal Ditambahkan ',
                    'data'       => $kategori
                ], 409); 
            }
    }
    public function show ($id)
    {
        $kategori = Kategori::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data kategori ',
            'data'       => $kategoi
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $kategori = Kategori::find($id)->update([
                'kategori' => $request->kategori,
                'deskripsi'=> $request->deskripsi,
                'transaksi_id'=> $request->transaksi_id,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data kategori telah berhasil di rubah',
                'data'    => $kategori
            ], 200);
        }
        public function destroy($id)
        {
            $buku = Buku::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data kategori berhasil di hapus',
                'data'    => $kategoi
            ], 200);
        }
        
    }
