<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Criar Nova Tarefa</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Título da Tarefa:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Criar Tarefa</button>
    </form>

    <a href="{{ route('tasks.index') }}">Voltar à lista de tarefas</a>
@endsection
