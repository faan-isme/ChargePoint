<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\OauthGoogleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
// route ini digunakan untuk membuat shortcut folder storage jika cPanel tidak bisa akses terminal
// Route::get('/storage-link', function(){
//     $target = storage_path('app/public');
//     $link = $_SERVER['DOCUMENT_ROOT'].'/storage';
//     symlink($target,$link);
//     echo 'ok';
// });

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

// email verivy
Route::get('/email/verify', [VerificationController::class,'notice'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('/email/verification-notification',[VerificationController::class, 'resendVerif'])->middleware(['auth', 'throttle:1,1'])->name('verification.send');


// Form Pendaftaran mitra
Route::view('/daftar', 'pages.Home.formPendaftaran')->name('formPendaftaran')->middleware(['auth', 'verified','check.formulir.acces']);
Route::post('/daftar',[FormulirController::class, 'insert'])->middleware(['auth', 'verified','check.formulir.acces']);


// Dashboard
Route::get('/admin/datapendaftaran', [ViewController::class,'formulir'])->name('DataPendaftaran')->middleware('admin.akses');
Route::get('/admin/checkpendaftaran/{id_formulir}', [ViewController::class,'cekFormulir'])->name('CheckPendaftaran')->middleware('admin.akses');
Route::get('/admin/checkpendaftaran/acc/{id}', [FormulirController::class, 'acc'])->name('acc')->middleware('admin.akses');
Route::post('/admin/checkpendaftaran/acc/{id}', [FormulirController::class, 'revisi'])->name('revisi')->middleware('admin.akses');

Route::get('/admin/pesan/{id}', [ViewController::class,'pesan'])->name('Pesan')->middleware('admin.akses');
Route::get('/admin/accpendaftaran', [ViewController::class,'hasil'])->name('AccPendaftaran')->middleware('admin.akses');
Route::get('/admin/revisipendaftaran', [ViewController::class,'revisi'])->name('RevisiPendaftaran')->middleware('admin.akses');

// buat route revisi menuju route revisi
Route::get('/user/revisiformulir/{id}', [ViewController::class,'revisiFormulir'])->name('RevisiFormulir')->middleware(['auth', 'verified']);
// buat route revisi menuju controller FormulirController update 
Route::put('/user/revisiformulir/{id}', [FormulirController::class,'update'])->name('UpdateFormulir')->middleware(['auth', 'verified']);


Route::get('/status/{status}',[ViewController::class,'status'])->name('status');


 
Route::get('/auth/redirect/google',[OauthGoogleController::class, 'redirect']);
 
Route::get('/auth/callback/google',[OauthGoogleController::class, 'callback']);