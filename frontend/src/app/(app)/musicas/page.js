'use client';

import useMusic from '@/hooks/music';
import Header from '@/app/(app)/Header';

const MusicList = () => {
    const { songs, loading, error } = useMusic();

    if (loading) return <div>Carregando...</div>;
    if (error) return <div>Erro: {error.message}</div>;

    return (
        <>
            <Header title="Músicas" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <table className="w-full table-auto">
                                <thead>
                                    <tr className="bg-gray-100">
                                        <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Título</th>
                                        <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Artista</th>
                                        <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Álbum</th>
                                        <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">URL</th>
                                        <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Usuário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {songs.map((song) => (
                                        <tr key={song.id}>
                                            <td className="px-6 py-4">{song.title}</td>
                                            <td className="px-6 py-4">{song.artist}</td>
                                            <td className="px-6 py-4">{song.album}</td>
                                            <td className="px-6 py-4"><a href={song.url} target="_blank" rel="noopener noreferrer">Link</a></td>
                                            <td className="px-6 py-4">{song.userName}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default MusicList;
