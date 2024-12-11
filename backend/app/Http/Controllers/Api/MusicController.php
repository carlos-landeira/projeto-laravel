<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    /**
     * Returns all songs which are linked to an user;
     */
    public function listSongsFromAllUsers()
    {
        $songs = DB::select("
            SELECT DISTINCT users.name as userName, song.* FROM song
            JOIN user_song ON song.id = user_song.idSong
            JOIN users ON user_song.idUser = users.id
        ");

        return response()->json($songs);
    }

    /**
     * Links a song with an user.
     */
    public function linkSong($songId, $userId)
    {
        /** @var Song */
        $song = Song::find($songId);
        /** @var User */
        $user = User::find($userId);

        if (!$song) {
            return response()->json(['error' => 'Música não encontrada'], 404);
        }

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->songs()->attach($song);
        return response()->json(['message' => 'Música vinculada com sucesso']);
    }
}
