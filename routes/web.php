<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaklumatController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return response()->download(public_path('test.txt'));
});


Route::get('/dashboard', function () {
    return redirect('/');
});


Route::name('maklumat')->prefix('maklumat')->group(function () {
    Route::get('/pelanggan', [MaklumatController::class, 'showPelanggan'])->name('.pelanggan');
    // Route::get('/pegawai', [MaklumatController::class, 'show'])->name('.pegawai');
    Route::post('/pelanggan', [MaklumatController::class, 'store'])->name('.pelanggan.store');
    Route::get('/pegawai', [MaklumatController::class, 'showPegawai'])->name('.pegawai');
    Route::delete('/padam/{id}', [MaklumatController::class, 'padamPelanggan'])->name('.pelanggan.padam');
    Route::get('/pelangganUpdate/{id}', [MaklumatController::class, 'editPelanggan'])->name('.pelanggan.edit');
    Route::patch('/pelanggan/update/{id}', [MaklumatController::class, 'updatePelanggan'])->name('.pelanggan.update');






});