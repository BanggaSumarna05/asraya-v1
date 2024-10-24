<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\PDF;

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
// require __DIR__ . '/auth.php';

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/mahogany', [FrontController::class, 'mahogany'])->name('mahogany');
Route::get('/cendana', [FrontController::class, 'cendana'])->name('cendana');
Route::get('/clubhouse', [FrontController::class, 'clubhouse'])->name('clubhouse');
Route::get('/brandgang', [FrontController::class, 'brandgang'])->name('brandgang');
Route::get('/vision-n-mission', [FrontController::class, 'visi'])->name('visimisi');
Route::get('/gym', [FrontController::class, 'gym'])->name('gym');
Route::get('/swimming-pool', [FrontController::class, 'spool'])->name('swimming-pool');
Route::get('/clinic', [FrontController::class, 'clinic'])->name('clinic');
Route::get('/taman-kota', [FrontController::class, 'tamanKota'])->name('tamanKota');
Route::get('/frequently-asked-questions', [FrontController::class, 'faq'])->name('faq');
Route::get('/getProgress-bosnya-pilih-pilih-karyawan-jangan-beli-disini', [FrontController::class, 'getProgress'])->name('getProgress');

Route::get('/ebrochure', [FrontController::class, 'ebrochure'])->name('ebrochure');
Route::get('/eprofile', [FrontController::class, 'eprofile'])->name('eprofile');
