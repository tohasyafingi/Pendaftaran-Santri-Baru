<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

Route::get('/', function () {
    return view('frontend.home2');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin'])->get('/dashboard/superadmin', function () {
    return view('backend.dashboard.superadmin');
});


Route::middleware(['auth', 'role:admin, superadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/daftar-santri-baru', [SantriController::class, 'index'])->name('admin.santri.index');
    Route::get('/admin/santri/{santri}/detail', [SantriController::class, 'show'])->name('backend.santri.detail');
    Route::delete('/admin/santri/{santri}', [SantriController::class, 'destroy'])->name('backend.santri.destroy');
    Route::put('/admin/santri/{santri}', [SantriController::class, 'update'])->name('backend.santri.update');
    // Route::post('/admin/santri/{santri}/verifikasi', [SantriController::class, 'verifikasi'])->name('backend.santri.verifikasi');
    Route::get('/admin/santri-ditolak', [SantriController::class, 'indexDitolak'])->name('backend.santri.ditolak');
    Route::get('/admin/santri-diterima', [SantriController::class, 'indexDiterima'])->name('backend.santri.diterima');
    Route::get('/admin/santri-daftar-ulang', [SantriController::class, 'indexDaftarUlang'])->name('admin.santri.daftarulang');
    Route::post('/admin/santri/{santri}/pesan', [SantriController::class, 'kirimPesan'])->name('backend.santri.kirimPesan');
    Route::get('/admin/log-aktivitas', [AdminController::class, 'logs'])->name('admin.logs.index');
});
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('pengumuman', PengumumanController::class)->only(['index', 'create', 'store', 'destroy']);
});


Route::middleware(['auth', 'role:santri'])->group(function () {
    Route::get('/santri/dashboard', [SantriController::class, 'dashboard'])->name('santri.dashboard');
    Route::get('/santri/identitas', [SantriController::class, 'formIdentitas'])->name('santri.identitas');
    Route::post('/santri/identitas', [SantriController::class, 'updateIdentitas'])->name('santri.identitas.update');
    Route::get('/santri/daftar-ulang', [SantriController::class, 'formDaftarUlang'])->name('santri.daftar_ulang.form');
    Route::post('/santri/daftar-ulang', [SantriController::class, 'prosesDaftarUlang'])->name('santri.daftar_ulang.proses');
});

Route::middleware('guest')->prefix('pendaftaran')->group(function () {
    Route::get('/', [SantriController::class, 'create'])->name('santri.form');
    Route::post('/', [SantriController::class, 'store'])->name('santri.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
