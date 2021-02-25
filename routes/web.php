<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/consumers', [ConsumerController::class, 'index'])->name('consumers.index');
Route::post('/consumers', [ConsumerController::class, 'store'])->name('consumers.store');
Route::get('/consumers/create', [ConsumerController::class, 'create'])->name('consumers.create');
Route::get('/consumers/{consumer}', [ConsumerController::class, 'show'])->name('consumers.show');
Route::delete('/consumers/{consumer}', [ConsumerController::class, 'destroy'])->name('consumers.destroy');

Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
Route::post('/meals', [MealController::class, 'store'])->name('meals.store');
Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meals.show');
Route::delete('/meals/{meal}', [MealController::class, 'destroy'])->name('meals.destroy');
Route::patch('/meals/close', [MealController::class, 'closeRegistration'])->name('meals.closeRegistration');
