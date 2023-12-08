<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JurusanController;
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

Route::get('/jadwal', function () {
    return view('jadwal/index');
})->middleware(['auth', 'verified'])->name('jadwal');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jurusan', JurusanController::class)->middleware(['auth']);

Route::resource('kelas', KelasController::class)->middleware(['auth']);

Route::resource('siswa', SiswaController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
