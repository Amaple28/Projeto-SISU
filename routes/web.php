<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\faculdade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\simulacao;

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
Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('simulacao')
    ->with('user', $user)
    ->with('simulacao',  simulacao::where('user_id',$user->id)->first())
    ->with('faculdades',  faculdade::all())
    ->with('estados',  faculdade::select('estado')->distinct()->get());
})->name('dashboard');

//DASHBOARD DO ADMIN
Route::get('/dashboard-admin', function () {
    $users = User::orderBy('id', 'desc')->paginate(15);
    $user = Auth::user();
    return view('dashboardAdmin')
    ->with('users', $users)
    ->with('user', $user);
})->name('admin');

Route::post('deletar/{id}',[AdminController::class, 'deletar']);

//Logout
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


//Rota Notas 2023
Route::get('/notas-2023', [AdminController::class, 'notas2023'])->name('notas2023');