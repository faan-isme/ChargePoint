<?php

use App\Http\Controllers\FormulirController;
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
Route::view('/daftar', 'pages.Home.formPendaftaran')->name('formPendaftaran')->middleware(['auth', 'verified']);
Route::post('/daftar',[FormulirController::class, 'insert'])->middleware(['auth', 'verified']);


