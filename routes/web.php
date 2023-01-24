<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LogoutController;
use App\Models\User;

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

//PÁGINA INICIAL
Route::get('/', [UserController::class, 'indexFront']);

// Route::get('/user_cadastro/{id}', [UserController::class, 'show']);

//CADASTRO DE USUÁRIO
Route::post('/criar-usuario',[UserController::class, 'criarUsuario']);

//LOGIN DE USUÁRIO
Route::post('/login',[UserController::class, 'login']);

//RECUPERAR SENHA

Route::get('/recuperar-senha',[ResetPasswordController::class, 'recuperarSenha']);
Route::post('/recuperacao-senha',[ResetPasswordController::class, 'recuperacaoSenha']);
Route::post('/nova-senha/{id}',[ResetPasswordController::class, 'novaSenha']);

//DASHBOARD DO USUÁRIO
<<<<<<< HEAD
Route::get('/dashboard',[UserController::class, 'dashboardUsuario']);
=======
Route::get('/dashboard/{id}',[UserController::class, 'dashboardUsuario'])->name('dashboard');
>>>>>>> c0d7a57a2850ae9888568524c72caea703282920

//DASHBOARD DO ADMIN
Route::get('/dashboard-admin/{id}', function ($id) {
    $users = User::all();
<<<<<<< HEAD
    return view('dashboardAdmin')
    ->with('users', $users);
=======
    $user = User::find($id);
    return view('front_telas.dashboardAdmin')
    ->with('users', $users)
    ->with('user', $user);
>>>>>>> c0d7a57a2850ae9888568524c72caea703282920
})->name('admin');

Route::post('deletar/{id}',[AdminController::class, 'deletar']);


//LOGOUT
Route::get('logout', [LogoutController::class, 'logout']);
