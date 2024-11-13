import React, { useState } from 'react';
import axios from 'axios';

const TaskForm = ({ fetchTasks, taskToEdit = null, setTaskToEdit }) => {
    const [title, setTitle] = useState(taskToEdit ? taskToEdit.title : '');

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            if (taskToEdit) {
                // Atualizar uma tarefa existente
                await axios.put(`http://localhost:8000/api/tasks/${taskToEdit.id}`, { title });
                setTaskToEdit(null); // Limpar tarefa em edição
            } else {
                // Criar uma nova tarefa
                await axios.post('http://localhost:8000/api/tasks', { title });
            }
            setTitle('');
            fetchTasks(); // Atualizar a lista de tarefas
        } catch (error) {
            console.error('Erro ao salvar a tarefa:', error);
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                placeholder="Digite uma nova tarefa"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                required
            />
            <button type="submit">{taskToEdit ? 'Atualizar' : 'Adicionar'}</button>
        </form>
    );
};

export default TaskForm;
