<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\SimulacaoController;
use App\Http\Controllers\EmailController;
use App\Models\faculdade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\simulacao;
use App\Util;

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

//CADASTRO DE USUÁRIO
Route::post('/criar-usuario',[UserController::class, 'criarUsuario']);
//LOGIN DE USUÁRIO
Route::post('/login',[UserController::class, 'login']);
//Logout
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

//RECUPERAR SENHA
Route::get('/recuperar-senha',[ResetPasswordController::class, 'recuperarSenha']);
Route::post('/recuperacao-senha',[ResetPasswordController::class, 'recuperacaoSenha']);
Route::post('/nova-senha/{id}',[ResetPasswordController::class, 'novaSenha']);

//DASHBOARD DO USUÁRIO
Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');

//DASHBOARD DO ADMIN
Route::get('/admin', [UserController::class, 'dashboardAdmin'])->name('admin');
    

Route::post('deletar/{id}',[AdminController::class, 'deletar']);

//Gerenciar faculdades
Route::get('/faculdades', [NotasController::class, 'faculdades'])->name('faculdades');
Route::get('/notas', [NotasController::class, 'notas'])->name('notas');

//baixar leads em excel
Route::get('/baixar-leads', [AdminController::class, 'baixarLeads'])->name('baixar-leads');
Route::get('/baixar-lead/{id}', [AdminController::class, 'baixarLead'])->name('baixar-lead');

//enviar e-mail
Route::get('/send-email-cadastro', [EmailController::class, 'sendEmailCadastro'])->name('send-email-cadastro');

//editar notas
Route::get('/editar-notas/{id?}', [NotasController::class, 'editarNotas'])->name('editar-notas');
Route::get('/salvar-notas/{id?}', [NotasController::class, 'salvarNotas'])->name('salvar-notas');

//editar permissoes
Route::get('/editar-permissoes/{id?}', [AdminController::class, 'editarPermissoes'])->name('editar-permissoes');
Route::get('/salvar-permissoes/{id?}', [AdminController::class, 'salvarPermissoes'])->name('salvar-permissoes');

//editar usuarios
Route::get('/delete-user/{id?}', [AdminController::class, 'deleteUser'])->name('delete-user');
Route::get('/users', [AdminController::class, 'users'])->name('users');

//simulacao
Route::get('/simulacao', [SimulacaoController::class, 'simulacaoFaculdades'])->name('simulacao');

//editar faculdades
Route::get('/editar-pesos/{id?}', [NotasController::class, 'editarPesos'])->name('editar-pesos');
Route::get('/salvar-pesos/{id?}', [NotasController::class, 'salvarPesos'])->name('salvar-pesos');