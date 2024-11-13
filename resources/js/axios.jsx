import axios from 'axios';

// Exemplo de uma chamada GET
axios.get('http://localhost:8000/api/tasks')
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        console.error('Erro ao buscar tarefas:', error);
    });
