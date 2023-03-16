<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\SimulacaoController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;

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


//USER
//Cadastro
Route::post('/criar-usuario', [UserController::class, 'criarUsuario']);
//Login - Logout
Route::post('/login', [UserController::class, 'login']);
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::middleware('authenticated')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    //Deletar Conta
    Route::post('/deletar-usuario', [UserController::class, 'deletarUsuario'])->name('deletar-usuario');
    //Dashboard User
    Route::get('/simulacao', [SimulacaoController::class, 'simulacaoFaculdades'])->name('simulacao');
});
//Recuperar senha
Route::get('/recuperar-senha', [EmailController::class, 'recuperarSenha']);
Route::post('/recuperacao-senha-email', [EmailController::class, 'recuperacaoSenhaEmail'])->name('recuperacao-senha-email');
Route::get('/nova-senha-form/{id}', [EmailController::class, 'novaSenhaForm']);
Route::post('/nova-senha/{id}', [EmailController::class, 'novaSenha']);


//ADMIN
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboardAdmin'])->name('admin');
    //Editar - deletar usuários
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/editar-usuario/{id?}', [AdminController::class, 'editarUsuario'])->name('editar-usuario');
    Route::get('/editar-senha-usuario/{id?}', [AdminController::class, 'editarSenha'])->name('editar-senha-usuario');
    Route::get('/delete-user/{id?}', [AdminController::class, 'deleteUser'])->name('delete-user');
    //Editar permissão de user
    Route::get('/editar-permissoes/{id?}', [AdminController::class, 'editarPermissao'])->name('editar-permissoes');
    //Baixar CSV com os leads 
    Route::get('/baixar-leads', [AdminController::class, 'baixarLeads'])->name('baixar-leads');

    //FACULDADES
    // Editar - deletar dados das faculdades
    Route::get('/faculdades', [NotasController::class, 'faculdades'])->name('faculdades');
    Route::get('/editar-pesos/{id?}', [NotasController::class, 'editarPesos'])->name('editar-pesos');
    Route::get('/salvar-pesos/{id?}', [NotasController::class, 'salvarPesos'])->name('salvar-pesos');
    Route::get('/deletar-faculdade/{id?}', [NotasController::class, 'deletarFaculdade'])->name('deletar-faculdade');
    Route::get('/adicionar-faculdade', [NotasController::class, 'adicionarFaculdade'])->name('adicionar-faculdade');
    //Editar - deletar dados das notas de corte
    Route::get('/editar-notas/{id?}', [NotasController::class, 'editarNotas'])->name('editar-notas');
    Route::get('/salvar-notas/{id?}', [NotasController::class, 'salvarNotas'])->name('salvar-notas');
    Route::get('/notas', [NotasController::class, 'notas'])->name('notas');
    Route::get('/editar-notas-2023', [NotasController::class, 'editarNotas2023'])->name('editar-notas-2023');
});
