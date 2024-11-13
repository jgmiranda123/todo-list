<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Lista de Tarefas</h1>
    <a href="{{ route('tasks.create') }}">Criar Nova Tarefa</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->description ?? 'Sem descrição' }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
                <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
