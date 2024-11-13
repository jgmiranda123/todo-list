<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rota para a lista de tarefas (Página Principal)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Rota para a criação de tarefas (Formulário de Nova Tarefa)
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Rota para armazenar a tarefa criada
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rota para editar uma tarefa
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Rota para atualizar a tarefa
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Rota para deletar a tarefa
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
