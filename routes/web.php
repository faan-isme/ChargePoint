<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ViewController;
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

// Home 
Route::view('/', 'pages.Home.Home')->name('home');

//login
Route::view('/login', 'pages.Login');
Route::post('/login',[SessionController::class, 'login'])->name('login');
//register
Route::view('/register', 'pages.Register');
Route::post('/register',[SessionController::class, 'register']);
//logout
Route::get('/logout',[SessionController::class, 'logout']);

// enail verivy
Route::get('/email/verify', [VerificationController::class,'notice'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('/email/verification-notification',[VerificationController::class, 'resendVerif'])->middleware(['auth', 'throttle:1,1'])->name('verification.send');






// Form Pendaftaran mitra
Route::view('/daftar', 'pages.Home.formPendaftaran')->name('formPendaftaran')->middleware(['auth', 'verified','check.formulir.acces']);
Route::post('/daftar',[FormulirController::class, 'insert'])->middleware(['auth', 'verified','check.formulir.acces']);


// Dashboard
Route::get('/admin/datapendaftaran', [ViewController::class,'formulir'])->name('DataPendaftaran');
Route::get('/admin/checkpendaftaran/{id_formulir}', [ViewController::class,'cekFormulir'])->name('CheckPendaftaran');
Route::get('/admin/checkpendaftaran/acc/{id}', [FormulirController::class, 'acc'])->name('acc');
Route::post('/admin/checkpendaftaran/acc/{id}', [FormulirController::class, 'revisi'])->name('revisi');

Route::get('/admin/pesan/{id}', [ViewController::class,'pesan'])->name('Pesan');
Route::get('/admin/accpendaftaran', [ViewController::class,'hasil'])->name('AccPendaftaran');
Route::get('/admin/revisipendaftaran', [ViewController::class,'revisi'])->name('RevisiPendaftaran');

// buat route revisi menuju route revisi
Route::get('/user/revisiformulir/{id}', [ViewController::class,'revisiFormulir'])->name('RevisiFormulir');
// buat route revisi menuju controller FormulirController update 
Route::put('/user/revisiformulir/{id}', [FormulirController::class,'update'])->name('UpdateFormulir');
// pasang middelware jika ststus formulir tidak sama dengan revisi maka dilarang

