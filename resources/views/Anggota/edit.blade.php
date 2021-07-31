@extends('layout.main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<form action="/anggota/{{ $ang['id_anggota'] }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama_Anggota</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_anggota" aria-describedby="emailHelp" value="{{ old('nama_anggota') ? old('nama_anggota') : $ang['nama_anggota'] }}">
    @error('nama_anggota')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>

 <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select id="jenis_kelamin" class="form-select">
        <option>Laki-Laki</option>
        <option>Perempuan</option>
      </select>
    </div> 

  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') ? old('alamat') : $ang['alamat'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>

 

<div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{ old('email') ? old('email') : $ang['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">No_tlp</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputPassword1" value="{{ old('no_tlp') ? old('no_tlp') : $ang['no_tlp'] }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



   
@endsection