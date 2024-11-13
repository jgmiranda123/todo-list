import './bootstrap';
import React, { useState } from 'react';
import TaskForm from './TaskForm.jsx';
import TaskList from './TaskList.jsx';

const App = () => {
    const [taskToEdit, setTaskToEdit] = useState(null);

    return (
        <div>
            <h1>Gerenciador de Tarefas</h1>
            <TaskForm fetchTasks={() => {}} taskToEdit={taskToEdit} setTaskToEdit={setTaskToEdit} />
            <TaskList setTaskToEdit={setTaskToEdit} />
        </div>
    );
};

export default App;
