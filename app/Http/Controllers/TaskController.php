<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar todas as tarefas
    public function index()
    {
        $tasks = Task::all();
        return view('task-view', compact('tasks')); // Passando as tarefas para a view
    }

    // Exibir formulário de criação
    public function create()
    {
        return view('task-form');
    }

    // Armazenar uma nova tarefa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    // Exibir formulário de edição
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task-form', compact('task'));
    }

    // Atualizar tarefa
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Deletar tarefa
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }
}
