<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;

// Rota para página inicial
Route::get('/', function () {
    return view('tarefa.index');
});

// Rota para redirecionar para a página de cadastro
Route::get('cadastrar', function () {
    return redirect()->route('usuario.create'); // Redireciona para a página de cadastro
});

// Rota para exibir o formulário de cadastro
Route::get('cadastro', [UsuarioController::class, 'create'])->name('usuario.create');

// Rota para processar o formulário de cadastro
Route::post('cadastro', [UsuarioController::class, 'store'])->name('usuario.store');


Route::get('tarefas/create', [TarefaController::class, 'create'])->name('tarefa.create');

//  Rotas para tarefas
Route::get('tarefas/create', [TarefaController::class, 'create'])->name('tarefa.create');

Route::post('tarefas', [TarefaController::class, 'store'])->name('tarefa.store');

// Rota para listar todas as tarefas
Route::get('tarefas', [TarefaController::class, 'index'])->name('tarefa.index');

// Rota para editar a tarefa
Route::get('tarefas/edit/{id}', [TarefaController::class, 'edit'])->name('tarefa.edit');

Route::put('tarefas/{id}', [TarefaController::class, 'update'])->name('tarefa.update');

// Rota para excluir a tarefa
Route::delete('tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
