
<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>{{ isset($task) ? 'Editar Tarefa' : 'Adicionar Nova Tarefa' }}</h1>
    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $task->description ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Atualizar' : 'Adicionar' }}</button>
    </form>
</div>
</body>
</html>
