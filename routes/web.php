<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\VerificationController;
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

// home
Route::view('/home','home')->name('home')->middleware(['auth','verified']);

// Home Tamu
Route::view('/home-chargepoint', 'pages.Home.Home')->name('Home');

// Form Pendaftaran Tamu
Route::view('/daftar', 'pages.Home.formPendaftaran')->name('formPendaftaran');

// Dashboard
Route::view('/admin/datapendaftaran', 'pages.Dashboard.DataPendaftaran')->name('DataPendaftaran');
Route::view('/admin/checkpendaftaran', 'pages.Dashboard.CheckPendaftaran')->name('CheckPendaftaran');
Route::view('/admin/notifikasi', 'pages.Dashboard.Notifikasi')->name('Notifikasi');
Route::view('/admin/accpendaftaran', 'pages.Dashboard.AccPendaftaran')->name('AccPendaftaran');
Route::view('/admin/prosespendaftaran', 'pages.Dashboard.ProsesPendaftaran')->name('ProsesPendaftaran');

