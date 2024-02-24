<?php

use App\Http\Controllers\AuthController;
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

///views only
Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('/user/login', function () {
    return view('login');
});
Route::get('/user/register', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});


//for
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//if you are auth
Route::middleware('auth')->group(function () {
    Route::get('/auth', function () {
        return view('auth');
    });
});
Route::redirect('/', '/user/login');
