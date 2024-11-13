<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description ?? 'Sem descrição disponível' }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}">Editar Tarefa</a>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar Tarefa</button>
    </form>

    <a href="{{ route('tasks.index') }}">Voltar à lista de tarefas</a>
@endsection

