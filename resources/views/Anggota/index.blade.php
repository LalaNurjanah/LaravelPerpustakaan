@extends('layout.main')
@section('title', 'Laravel - SI Perpustakaan')
@section('content')

<div class="container">
<div class="jumbotron">
@if(session('msg'))
<div class="alert alert-success alert-dismissible fade show mt-2" 
                role="alert">
{{session('msg')}}
<button type="button" class="close" data-dismiss="alert" 
                aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<h1 class="display-6">Data Anggota</h1>

<a href="/anggota/create" class="card-link btn-primary">Tambah Anggota</a>
@foreach ($anggota as $ang)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/anggota/{{$ang['id']}}" class="card-title"> {{ $ang['nama_anggota'] }}</a>
      <p class="card-text"> {{ $ang['jenis_kelamin'] }}</p>
      <h6 class="card-text"> {{ $ang['alamat'] }}</h6>
    <p class="card-text"> {{ $ang['email'] }}</p>
    <h6 class="card-subtitle mb-2 text-muted"> {{ $ang['no_telp'] }}</h6>
    
    <a href="/anggota/{{$ang['id']}}/edit" class="card-link btn-warning">Edit Anggota</a>
    <form action="/anggota/{{ $ang['id']}}" method="POST">
  

    <button class="card-link btn-danger">Delete Anggota</a>
    </form>
  </div>
</div>


@endforeach
<div>
{{$anggota->links()}}
 </div>
@endsection

