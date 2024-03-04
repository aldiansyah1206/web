<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
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
    return view('auth/login');
});
Route::get('/logout', function () {
    return view('auth/login');
});

Route::get('siswa/profil', function () {
    return view('siswa/profil');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/presensi', function () {
    return view('presensi/index');
})->middleware(['auth', 'verified'])->name('presensi');

Route::get('/jadwal', function () {
    return view('jadwal/index');
})->middleware(['auth', 'verified'])->name('jadwal');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jurusan', JurusanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('kelas', KelasController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('kegiatan', KegiatanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('pembina', PembinaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('siswa', SiswaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

require __DIR__.'/auth.php';
