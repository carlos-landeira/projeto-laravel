'use client';

import { useState, useEffect } from 'react';
import axios from 'axios';

const useMusic = () => {
    const [songs, setSongs] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const getMusicList = async () => {
            try {
                const response = await axios.get('http://localhost:8000/api/music');
                setSongs(response.data);
                setLoading(false);
            } catch (err) {
                setError(err);
                setLoading(false);
            }
        };

        getMusicList();
    }, []);

    return { songs, loading, error };
};

export default useMusic;
