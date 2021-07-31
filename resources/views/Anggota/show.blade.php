@extends('layout.main')

@section('title', 'Perpustakaan Pertama')
@section('content')
<div class="card">
    <div class="card-body">
        <h3>nama_anggota:{{$ang['nama_anggota']}}</h3>
       <h3>Jenis_Kelamin:{{$ang['jenis_kelamin']}}</h3> 
       <h3>Alamat:{{$ang['alamat']}}</h3> 
        <h3>Email:{{$ang['email']}}</h3>
        <h3>No Tlp:{{$ang['no_telp']}}</h3>
    </div>
</div>
@endsection