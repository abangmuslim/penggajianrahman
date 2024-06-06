<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LaporanController;

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

// Route::get('/',function(){
//     return view('welcome',[
//         "title"=>"Dashboard"
//     ]);
// })->middleware('auth');

Route::get('/', [WelcomeController::class, 'welcome'])->middleware('auth');
Route::resource('gaji', GajiController::class)->middleware('auth');
Route::resource('user', UserController::class)->except('destroy', 'create', 'show', 'update', 'edit')->middleware('auth');
Route::resource('pegawai', PegawaiController::class)->except('destroy')->middleware('auth');

Route::get('login', [LoginController::class, 'loginView'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('gajian', function () {
    return view('gajian.index', [
        "title" => "Gajian"
    ]);
})->name('gajian')->middleware('auth');

Route::get('penggajian', function () {
    return view('gajian.penggajians', [
        "title" => "penggajian"
    ]);
})->middleware('auth');

Route::get('cetakReceipt', [CetakController::class, 'receipt'])->name('cetakReceipt');

Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');




