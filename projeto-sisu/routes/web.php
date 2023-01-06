<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/index',[UserController::class, 'index']);

Route::post('/criar-usuario',[UserController::class, 'criarUsuario']);

// ROTAS DAS TELAS DO FRONT
Route::get('/index-front',[UserController::class, 'indexFront']);