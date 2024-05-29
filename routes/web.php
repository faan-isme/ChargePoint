<?php

use App\Http\Controllers\SessionController;
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

// landing page
Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', function () {
    return view('login');});
Route::post('/login',[SessionController::class, 'login'])->name('login');
//register
Route::get('/register', function () {
    return view('register');});
Route::post('/register',[SessionController::class, 'register']);
//logout
Route::get('/logout',[SessionController::class, 'logout']);