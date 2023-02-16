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
Route::get('/', [UserController::class, 'indexFront'])->name('index');

Route::get('/colocacao', [AdminController::class, 'colocacao'])->name('colocacao');

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
Route::get('/recuperar-senha',[EmailController::class, 'recuperarSenha']);
Route::post('/recuperacao-senha-email',[EmailController::class, 'recuperacaoSenhaEmail'])->name('recuperacao-senha-email');
Route::get('/nova-senha-form/{id}',[EmailController::class, 'novaSenhaForm']);
Route::post('/nova-senha/{id}',[EmailController::class, 'novaSenha']);

//DASHBOARD DO USUÁRIO
Route::middleware('authenticated')->group(function() {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware('auth');
});


//DASHBOARD DO ADMIN
Route::middleware('admin')->group(function() {
    Route::get('/admin', [UserController::class, 'dashboardAdmin'])->name('admin');
    Route::post('deletar/{id}',[AdminController::class, 'deletar']);
});



//Gerenciar faculdades
Route::middleware('admin')->group(function() {
    Route::get('/faculdades', [NotasController::class, 'faculdades'])->name('faculdades');
    Route::get('/notas', [NotasController::class, 'notas'])->name('notas');
    Route::get('/editar-notas-2023', [NotasController::class, 'editarNotas2023'])->name('editar-notas-2023');
});

//baixar leads em excel
Route::middleware('admin')->group(function() {
    Route::get('/baixar-leads', [AdminController::class, 'baixarLeads'])->name('baixar-leads');
    Route::get('/baixar-lead/{id}', [AdminController::class, 'baixarLead'])->name('baixar-lead');
});

//editar notas
Route::middleware('admin')->group(function() {
    Route::get('/editar-notas/{id?}', [NotasController::class, 'editarNotas'])->name('editar-notas');
    Route::get('/salvar-notas/{id?}', [NotasController::class, 'salvarNotas'])->name('salvar-notas');
});


//editar permissoes
Route::middleware('admin')->group(function() {
    Route::get('/editar-permissoes/{id?}', [AdminController::class, 'editarPermissao'])->name('editar-permissoes');
});


//editar usuarios
Route::middleware('admin')->group(function() {
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/editar-usuario/{id?}', [AdminController::class, 'editarUsuario'])->name('editar-usuario');
    Route::get('/editar-senha-usuario/{id?}', [AdminController::class, 'editarSenha'])->name('editar-senha-usuario');
    Route::post('/deletar-usuario', [AdminController::class, 'deletarUsuario'])->name('deletar-usuario');
});

//Usuario deletar ele mesmo
Route::middleware('authenticated')->group(function() {

    Route::get('/delete-user/{id?}', [AdminController::class, 'deleteUser'])->name('delete-user');
    //simulacao
    Route::get('/simulacao', [SimulacaoController::class, 'simulacaoFaculdades'])->name('simulacao');
});

Route::middleware('admin')->group(function() {
    //editar faculdades
    Route::get('/editar-pesos/{id?}', [NotasController::class, 'editarPesos'])->name('editar-pesos');
    Route::get('/salvar-pesos/{id?}', [NotasController::class, 'salvarPesos'])->name('salvar-pesos');
    Route::get('/deletar-faculdade/{id?}', [NotasController::class, 'deletarFaculdade'])->name('deletar-faculdade');

    Route::get('/editar-notas-2023', [NotasController::class, 'editarNotas2023'])->name('editar-notas-2023');

    Route::get('/adicionar-faculdade', [NotasController::class, 'adicionarFaculdade'])->name('adicionar-faculdade');
});
