<?php

use App\Http\Controllers\Api\MusicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/music', [MusicController::class, 'listSongsFromAllUsers']);

Route::post('/music/{music}/user/{user}', [MusicController::class, 'linkSong']);
