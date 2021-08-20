<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/users', [UserController::class, 'addUser']);

Route::get('/users/username/{username}', [UserController::class, 'getUsersByUserName']);
Route::get('/users/email/{email}', [UserController::class, 'getUsersByEmail']);
Route::get('/users/phone/{phone}', [UserController::class, 'getUsersByPhone']);
Route::get('/users', [UserController::class, 'getAllUsers']);

Route::delete('/users/username/{username}', [UserController::class, 'removeUsersByUsername']);
Route::delete('/users/email/{email}', [UserController::class, 'removeUsersByEmail']);
Route::delete('/users/phone/{phone}', [UserController::class, 'removeUsersByPhone']);
