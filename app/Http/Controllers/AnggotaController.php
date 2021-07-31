<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::orderBy('id_anggota', 'desc')->paginate(3);
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'nama_anggota' => 'required|unique:anggota|max:255',
              'jenis_kelamin' => 'required',
            'alamat' => 'required',
             'email' => 'required',
             'no_telp' =>'required|numeric',
           
        ]);
        $anggota = new anggota;
        
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->no_telp = $request->no_tlp;
        $anggota->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota= Anggota::where('id_anggota', $id)->first();
        return view ('anggota.show', ['ang' => $anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota= Anggota::where('id', $id)->first();
        return view ('anggota.edit', ['ang' => $anggota]);
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
        Anggota::find($id)->update([
        $anggota->nama_anggota = $request->nama_anggota,
        $anggota->jenis_kelamin = $request->jenis_kelamin,
        $anggota->alamat = $request->alamat,
        $anggota->email = $request->email,
        $anggota->no_telp = $request->no_telp,
        ]);

        return redirect ('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Anggota::find($id)->delete();
        return redirect ('/');
    }
}
