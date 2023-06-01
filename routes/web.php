<?php

use App\Http\Controllers\ProjetoController;
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
// });

// Rotas de Projetos
Route::get('/', [ProjetoController::class, 'index'])->name('index.projeto');
Route::get('/addProjeto', [ProjetoController::class, 'create'])->name('projeto.create');
Route::post('/addProjeto', [ProjetoController::class, 'store'])->name('projeto.store');
Route::get('/editProjeto/{id}', [ProjetoController::class, 'edit'])->name('projeto.edit');
Route::put('/editProjeto/{id}', [ProjetoController::class, 'update'])->name('projeto.update');
Route::delete('/delete/{id}', [ProjetoController::class, 'destroy'])->name("projeto.destroy");

//Rota de Projetos para Tarefas
Route::get('/tarefas/{id}', [ProjetoController::class, 'showTarefa'])->name('tarefa.show');

//Rotas de Tarefas

// Rotas de Pesquisa de Projetos e Tarefas
Route::get('/pesquisaProjeto', [ProjetoController::class, 'pesquisaProjeto'])->name('projeto.pesquisa');