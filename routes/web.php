<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\peminjamanController;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Pelanggan
    Route::get('create_pelanggan', [pelangganController::class, 'create']);
    Route::post('save_pelanggan', [pelangganController::class, 'save']);

    Route::get('read_pelanggan', [pelangganController::class, 'read']);

    Route::get('update_pelanggan/{id_pelanggan}', [pelangganController::class, 'update']);
    Route::post('edit_pelanggan/', [pelangganController::class, 'edit']);
    Route::delete('/delete_pelanggan/{id_pelanggan}', [pelangganController::class, 'delete']);

    //Buku
    Route::resource('buku', \App\Http\Controllers\bukuController::class);

    //Peminjaman
    Route::resource('peminjaman', \App\Http\Controllers\peminjamanController::class);
    Route::get('kembali/{id_peminjaman}', [peminjamanController::class, 'kembali']);
});
