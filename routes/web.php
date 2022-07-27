<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// ----------------------------On Listing Controller ----------------------------
// render listings page
Route::get('/', [ListingController::class, 'index']);

// render create page
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Post user's post
Route::post('/listings', [ListingController::class, 'store']);

// Show edit post
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');;

// PUT user's post
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');;

// DELETE user's post
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');;

// render manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// render listing page
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// ----------------------------On User Controller ------------------------------
// render register page
Route::get('/register', [UserController::class, 'register'])->middleware('guest');;

// render login page
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;

// login the user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// create user account and login
Route::post('/users', [UserController::class, 'createUserAndLogin']);

// user logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
