<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KodeGuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JurnalController;

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

Route::get('/', function () {
   return view('welcome');
});

Route::get('/loginadmin', [AuthController::class, 'adminlogin']);
Route::get('/loginguru', [AuthController::class, 'gurulogin']);
Route::post('/authadmin', [AuthController::class, 'authadmin']);
Route::post('/authguru', [AuthController::class, 'authguru']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {

   Route::get('/admin', [AdminController::class, 'index']);

   Route::get('/dataguru', [AdminController::class, 'dataguru']);
   Route::get('/nondataguru', [AdminController::class, 'nondataguru']);
   Route::get('/aktifguru/{id}', [GuruController::class, 'aktifguru']);
   Route::post('/importguru', [GuruController::class, 'importguru']);
   Route::get('/addguru', [GuruController::class, 'addguru']);
   Route::post('/createguru', [GuruController::class, 'createguru']);
   Route::get('/editguru/{id}', [GuruController::class, 'editguru']);
   Route::post('/updateguru/{id}', [GuruController::class, 'updateguru']);
   Route::get('/deleteguru/{id}', [GuruController::class, 'deleteguru']);

   Route::get('/kodeguru', [AdminController::class, 'kodeguru']);
   Route::post('/importkode', [KodeGuruController::class, 'importkode']);
   Route::get('/addkode', [KodeGuruController::class, 'addkode']);
   Route::post('/createkode', [KodeGuruController::class, 'createkode']);
   Route::get('/editkode/{id}', [KodeGuruController::class, 'editkode']);
   Route::post('/updatekode/{id}', [KodeGuruController::class, 'updatekode']);
   Route::get('/deletekode/{id}', [KodeGuruController::class, 'deletekode']);

   Route::get('/mapel', [AdminController::class, 'mapel']);
   Route::get('/addmapel', [MapelController::class, 'addmapel']);
   Route::post('/createmapel', [MapelController::class, 'createmapel']);
   Route::get('/editmapel/{id}', [MapelController::class, 'editmapel']);
   Route::post('/updatemapel/{id}', [MapelController::class, 'updatemapel']);
   Route::get('/deletemapel/{id}', [MapelController::class, 'deletemapel']);

   Route::get('/jadwal', [AdminController::class, 'jadwal']);
   Route::post('/filjadwal', [JadwalController::class, 'filjadwal']);
   Route::post('/importjadwal', [JadwalController::class, 'importjadwal']);
   Route::get('/addjadwal', [JadwalController::class, 'addjadwal']);
   Route::post('/createjadwal', [JadwalController::class, 'createjadwal']);
   Route::get('/editjadwal', [JadwalController::class, 'editjadwal']);
   Route::post('/updatejadwal', [JadwalController::class, 'updatejadwal']);
   Route::get('/deletejadwal', [JadwalController::class, 'deletejadwal']);

   Route::get('/jurnal', [AdminController::class, 'jurnal']);
   Route::get('/nonjurnal', [AdminController::class, 'nonjurnal']);
   Route::post('/filjurnal', [JurnalController::class, 'filjurnal']);
   Route::get('/detailjurnal/{id}', [JurnalController::class, 'detailjurnal']);

   Route::get('/jurusan', [AdminController::class, 'jurusan']);
   Route::get('/addjurusan', [JurusanController::class, 'addjurusan']);
   Route::post('/createjurusan', [JurusanController::class, 'createjurusan']);
   Route::get('/editjurusan/{id}', [JurusanController::class, 'editjurusan']);
   Route::post('/updatejurusan/{id}', [JurusanController::class, 'updatejurusan']);
   Route::get('/deletejurusan/{id}', [JurusanController::class, 'deletejurusan']);
});

Route::middleware('guru')->group(function () {
   Route::get('/guru', [GuruController::class, 'index']);
});
