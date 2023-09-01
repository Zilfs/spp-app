<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-procces');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/pembayaran', [SppController::class, 'index'])->name('pembayaran');
Route::post('/add-pembayaran', [SppController::class, 'store'])->name('add-pembayaran');
Route::delete('/delete-pembayaran/{id}', [SppController::class, 'destroy'])->name('delete-pembayaran');
Route::post('/edit-pembayaran/{id}', [SppController::class, 'update'])->name('edit-pembayaran');
Route::get('/export-data', [SppController::class, 'exportExcel'])->name('export-data');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['UserLoginCheck:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['UserLoginCheck:siswa']], function () {
        Route::resource('siswa', SiswaController::class);
    });
});
