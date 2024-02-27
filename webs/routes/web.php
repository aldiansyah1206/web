<?php

use App\Http\Controllers\ProfileController;
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
// manual router
Route::get('siswa/profil', function () {
    return view('siswa/profil');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pembina', function () {
    return view('pembina/index');
})->middleware(['auth', 'verified'])->name('pembina');

Route::get('/siswa', function () {
    return view('siswa/index');
})->middleware(['auth', 'verified'])->name('siswa');

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

Route::resource('jurusan', JurusanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'delete']);
Route::delete('jurusan/{jurusan}/destroy', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
Route::get("jurusan/{id}/edit", [JurusanController::class, "edit"])->name("jurusan.edit");

Route::resource('kelas', KelasController::class)->only(['index', 'create', 'store', 'edit', 'update', 'delete']);
Route::delete('/kelas/{kelas}/destroy', [KelasController::class, 'destroy'])->name('kelas.destroy');
Route::patch("kelas/{kela}/edit", [KelasController::class, "edit"])->name('kelas.edit');

Route::resource('kegiatan', KegiatanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::delete('kegiatan/{kegiatan}/destroy', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
Route::patch("kegiatan/{kegiatan}/edit", [KegiatanController::class, "edit"])->name('kegiatan.edit');

Route::resource('siswa', SiswaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::delete('siswa/{siswa}/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::patch("siswa/{siswa}/edit", [SiswaController::class, "edit"])->name('siswa.edit');



require __DIR__.'/auth.php';
