<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model

{

protected $table = 'table_anggota';
protected $fillable = ['nama_anggota','jenis_kelamin','alamat',
                           'email','no_telp'];
                           

}
