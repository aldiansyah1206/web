<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DashboardController;
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
// login
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/logout', function () {
    return view('auth/login');
});
// profil siswa
Route::get('siswa/profil', function () {
    return view('siswa/profil');
});
// profil pembina
Route::get('pembina/profil', function () {
    return view('pembina/profil');
});

// dashboard
Route::middleware(['auth:siswa'])->group(function () {
    Route::view('/dashboard-siswa', 'dashboard')->name('dashboard.siswa');
});

Route::middleware(['auth:pembina'])->group(function () {
    Route::view('/dashboard-pembina', 'dashboard')->name('dashboard.pembina');
});

Route::middleware(['auth:web'])->group(function () {
    Route::view('/dashboard-admin', 'dashboard')->name('dashboard.admin');
});

Route::get('/presensi', function () {
    return view('presensi/index');
})->middleware(['auth:pembina'])->name('presensi');

Route::get('/kegiatan', function () {
    return view('kegiatan/index');
})->middleware(['auth', 'verified'])->name('kegiatan');

Route::get('/jadwal', function () {
    return view('jadwal/index');
})->middleware(['auth', 'verified'])->name('jadwal');


Route::middleware(['auth:siswa'])->group(function () {
    Route::view('/dashboard', 'dashboard');
});

Route::middleware(['auth:pembina'])->group(function () {
    Route::view('/dashboard', 'dashboard');
});

Route::middleware(['auth:web'])->group(function () {
    Route::view('/dashboard', 'dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jurusan', JurusanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);

Route::resource('kegiatan', KegiatanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('pembina', PembinaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('siswa', SiswaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

require __DIR__.'/auth.php';
