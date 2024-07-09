<?php

namespace App\Http\Controllers;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
// Route::get('/add', function (){
//     return view ('add_landmark');
// })->name('add');
Route::get('/', [LandmarkController::class, 'index'])->name('home');
Route::get('/search-results', [LandmarkController::class, 'index_filtering'])->name('search');
Route::get('/add', [LandmarkController::class, 'create'])->name('add')->middleware('auth');
Route::post('/add', [LandmarkController::class, 'store'])->name('add')->middleware('auth');
Route::get('/view'.'/{id}', [LandmarkController::class, 'show'])->name('view')->middleware('auth');
Route::get('/update'.'/{id}', [LandmarkController::class, 'edit'])->middleware('auth');
Route::put('/update'.'/{id}', [LandmarkController::class, 'update'])->name('update')->middleware('auth');
Route::get('/remove'.'/{id}', [LandmarkController::class, 'destroy'])->name('remove')->middleware('auth');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login', [LandmarkController::class, 'login'])->name('login');
Route::get('/logout', [LandmarkController::class, 'logout'])->name('logout')->middleware('auth');