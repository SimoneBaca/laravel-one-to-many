<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::middleware("auth")
  ->namespace("Admin") 
  ->name("admin.") 
  ->prefix("admin") 
  ->group(function () {
    Route::get('/', 'HomeController@index')->name('index');    
    Route::resource("posts", "PostController");
    Route::resource("users" , "UserController");
  });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
