<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Tarefa</h1>

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Título da Tarefa:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description">{{ $task->description }}</textarea>

        <button type="submit">Atualizar Tarefa</button>
    </form>

    <a href="{{ route('tasks.index') }}">Voltar à lista de tarefas</a>
@endsection
