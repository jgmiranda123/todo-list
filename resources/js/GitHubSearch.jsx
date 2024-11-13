import React, { useState } from 'react';
import axios from 'axios';

const GitHubSearch = () => {
    const [username, setUsername] = useState('');
    const [repos, setRepos] = useState([]);

    const handleSearch = async () => {
        const response = await axios.get(`https://api.github.com/users/${username}/repos`);
        setRepos(response.data);
    };

    return (
        <div>
            <input
                type="text"
                value={username}
                onChange={(e) => setUsername(e.target.value)}
                placeholder="GitHub username"
            />
            <button onClick={handleSearch}>Search</button>
            <ul>
                {repos.map((repo) => (
                    <li key={repo.id}>{repo.name}</li>
                ))}
            </ul>
        </div>
    );
};

export default GitHubSearch;
