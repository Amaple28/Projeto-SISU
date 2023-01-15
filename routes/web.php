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

Route::get('/', [UserController::class, 'indexFront']);

Route::get('/user_cadastro/{id}', [UserController::class, 'show']);

Route::post('/criar-usuario',[UserController::class, 'criarUsuario']);

Route::post('/login',[UserController::class, 'login']);

Route::get('/home/{id}',[UserController::class, 'indexLogin']);

// ROTAS DAS TELAS DO FRONT
