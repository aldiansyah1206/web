<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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

Route::get('/kegiatan', function () {
    return view('kegiatan/index');
})->middleware(['auth', 'verified'])->name('kegiatan');

Route::resource('kegiatan', KegiatanController::class)->middleware(['auth'])->names('kegiatan');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jurusan', JurusanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'delete']);
Route::delete("jurusan/{id}/delete", [JurusanController::class, "delete"])->name("jurusan.delete");
Route::get("jurusan/{id}/edit", [JurusanController::class, "edit"])->name("jurusan.edit");

Route::resource('kelas', KelasController::class)->middleware(['auth']);
Route::patch('kelas/{kela}/update', 'KelasController@update')->name('kelas.update');
Route::delete('/kelas/{kelas}', 'KelasController@destroy')->name('kelas.destroy');

Route::resource('siswa', SiswaController::class)->middleware(['auth']);
Route::delete('siswa/{id}/delete', 'SiswaController@destroy')->name('siswa.destroy');


require __DIR__.'/auth.php';
