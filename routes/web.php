<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
//Publicas
Route::get('/', [App\Http\Controllers\RestaurantController::class, 'showFrontPage'])->name('front_page.index');
///////////////////////////////////////////////////////////////////////////
//Privadas
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('restaurants', App\Http\Controllers\RestaurantController::class);
});


/* Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create'); */