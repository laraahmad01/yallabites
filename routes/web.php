<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewsController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/userhome', function () {
    return view('userhome');
});

//Route::post("store/{id}", [reviewcontroller::class,'store'])->name('store');
//Route::get("create/{id}", [reviewcontroller::class,'create'])->name('create');
Route::get('/', function () {
    return view('reviews');
});
Route::post("review/{store_id}", [ReviewsController::class,'create'])->name('review');
