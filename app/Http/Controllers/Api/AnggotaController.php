<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data anggota',
            'data' => $anggota
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
       'alamat' => $request->alamat,
       'email' => $request->email,
       'no_telp' => $request->no_telp,


        ]);
       if($anggota){
           return response()->json([
            'success' => true,
            'message' => 'anggota berhasil ditambahkan',
            'data' => $anggota
           ], 200);
       }else{
        return response()->json([
            'success' => false,
            'message' => 'anggota gagal ditambahkan',
            'data' => $anggota
        ], 409);

       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::all();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data anggota',
            'data'    => $anggota
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required|unique:anggota|max:255',
            'jenis_kelamin' => 'required',
          'alamat' => 'required',
           'email' => 'required',
           'no_telp' =>'required|numeric',
        ]);
        $Ang = Anggota::find($id)->update([
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $Ang
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Anggota::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }

}
