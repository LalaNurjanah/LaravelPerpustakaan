@extends('layout.main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
   

<form action="/anggota" method="post">
  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Anggota</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_anggota" aria-describedby="emailHelp" value="{{ old('nama_anggota') }}">
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
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  
    <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No_tlp</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputPassword1" value="{{ old('no_tlp') }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  
 
  <button type="submit" class="btn btn-primary">Tambah Anggota</button>
</form>



   
@endsection