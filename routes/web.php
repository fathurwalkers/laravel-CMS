<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\FrontController as HomeFront;
use App\Http\Controllers\Admin\FrontController as AdminFront;
use App\Http\Controllers\Admin\BackController;

// TEST Routing
// Route::get('/', function () {
//     return view('welcome');
// });

// ADMINISTRATOR Routing
Route::group(['prefix' => '/dashboard', 'middleware' => 'checkauth'], function () {
    Route::get('/', [AdminFront::class, 'index'])->name('admin-index');
});

// HOME Routing
Route::group(['prefix' => '/home'], function () {
    Route::get('/', [HomeFront::class, 'index'])->name('home-index');
});

Route::get('/login', [AdminFront::class, 'login'])->name('login-page');
Route::post('/login', [BackController::class, 'postLogin'])->name('post-login');
Route::get('/register', [AdminFront::class, 'register'])->name('register-page');
Route::post('/register', [BackController::class, 'postRegister'])->name('post-register');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');


// AUTO GENERATE USER DATA
Route::get('/generate-user', [BackController::class, 'generateUser']);
