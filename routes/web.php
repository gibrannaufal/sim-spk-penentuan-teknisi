<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PerankinganController;

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

// Pastikan rute '/' tidak memiliki middleware 'guest'
Route::get('/home', [PerankinganController::class, 'home'])->name('home')->middleware('auth');


// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// karyawan 
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan')->middleware('auth');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan_store')->middleware('auth');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan_update')->middleware('auth');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan_delete')->middleware('auth');

// perhitungan weighted product
Route::get('/perhitungan', function () { return view('perhitungan'); })->middleware('auth');
Route::get('/normalisasi-data', [PerankinganController::class, 'getAllNormalisasi'])->name('normalisasi-data')->middleware('auth');
Route::get('/vektor-data', [PerankinganController::class, 'getVektorData'])->name('vektor-data')->middleware('auth');
Route::get('/nilaiv-data', [PerankinganController::class, 'getNilaiVData'])->name('nilaiv-data')->middleware('auth');

// Ranking
Route::get('/ranking-data', [PerankinganController::class, 'getRankingData'])->name('ranking-data')->middleware('auth');