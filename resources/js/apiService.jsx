// Importando axios
import axios from 'axios';

// Configuração base do axios (opcional)
const apiClient = axios.create({
    baseURL: 'http://localhost:8000/api',
    timeout: 1000, // Tempo limite opcional
});

// Função para buscar todas as tarefas
export const getTasks = async () => {
    try {
        const response = await apiClient.get('/tasks');
        return response.data;
    } catch (error) {
        console.error('Erro ao buscar as tarefas:', error);
        throw error;
    }
};

// Outras funções para criar, atualizar e deletar tarefas podem ser adicionadas aqui

import React, { useState, useEffect } from 'react';
import { getTasks } from './apiService.jsx'; // Importando a função de serviço

const TaskList = () => {
    const [tasks, setTasks] = useState([]);

    useEffect(() => {
        getTasks().then(setTasks).catch(console.error);
    }, []);

    return (
        <div>
            <h1>Lista de Tarefas</h1>
            <ul>
                {tasks.map(task => (
                    <li key={task.id}>{task.title}</li>
                ))}
            </ul>
        </div>
    );
};

export default TaskList;
