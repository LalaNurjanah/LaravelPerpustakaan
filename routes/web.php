<?php
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('', [AnggotaController::class, 'index']);
//route::get('/anggota', [AnggotaController::class, 'index']);
//route::get('/anggota/create', [AnggotaController::class, 'create']);
//route::post('/anggota', [AnggotaController::class, 'store']);
//route::get('/anggota/{id}', [AnggotaController::class, 'show']);
//route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit']);
//route::put('/anggota/{id}', [AnggotaController::class, 'update']);
//route::delete('/anggota/{id}', [AnggotaController::class, 'destroy']);

route::resources([
    'anggota' =>AnggotaController::class,
    'kategori' =>KategoriController::class,
    'buku' =>BukuController::class,
    'Transaksi' =>TransaksiController::class,
]); 

