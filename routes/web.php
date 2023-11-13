<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('pegawai');
});

Route::get('/absensi', function () {
    return view('absensi/absensi');
})->name('absensi');

//pegawai
Route::get('/pegawai',[PegawaiController::class, "index"])->name('pegawai');
Route::get('/pegawai/{id}',[PegawaiController::class, "edit"]);
Route::post('/pegawai',[PegawaiController::class, "store"]);
Route::delete('/pegawai',[PegawaiController::class, "destroy"]);
Route::patch('/pegawai',[PegawaiController::class, "update"]);

//gaji
Route::get('/gaji', [GajiController::class, "index"]);
Route::post('/gaji', [GajiController::class, "store"]);

//absensi
Route::get('/absensi',[AbsenController::class, "index"]);
Route::post('/absensi',[AbsenController::class, "store"]);
Route::get('/absensi/master',[AbsenController::class, "show"]);
