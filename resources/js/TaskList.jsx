import React, { useState, useEffect } from 'react';
import axios from 'axios';

const TaskList = ({ setTaskToEdit }) => {
    const [tasks, setTasks] = useState([]);

    const fetchTasks = async () => {
        try {
            const response = await axios.get('http://localhost:8000/api/tasks');
            setTasks(response.data);
        } catch (error) {
            console.error('Erro ao buscar as tarefas:', error);
        }
    };

    useEffect(() => {
        fetchTasks();
    }, []);

    const handleDelete = async (id) => {
        try {
            await axios.delete(`http://localhost:8000/api/tasks/${id}`);
            fetchTasks(); // Atualizar a lista de tarefas após deletar
        } catch (error) {
            console.error('Erro ao deletar a tarefa:', error);
        }
    };

    const handleToggleComplete = async (task) => {
        try {
            await axios.put(`http://localhost:8000/api/tasks/${task.id}`, {
                is_complete: !task.is_complete,
            });
            fetchTasks(); // Atualizar a lista de tarefas após alteração
        } catch (error) {
            console.error('Erro ao atualizar a tarefa:', error);
        }
    };

    return (
        <div>
            <h2>Lista de Tarefas</h2>
            <ul>
                {tasks.map((task) => (
                    <li key={task.id}>
            <span style={{ textDecoration: task.is_complete ? 'line-through' : 'none' }}>
              {task.title}
            </span>
                        <button onClick={() => handleToggleComplete(task)}>
                            {task.is_complete ? 'Marcar como Incompleta' : 'Marcar como Completa'}
                        </button>
                        <button onClick={() => handleDelete(task.id)}>Deletar</button>
                        <button onClick={() => setTaskToEdit(task)}>Editar</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default TaskList;
