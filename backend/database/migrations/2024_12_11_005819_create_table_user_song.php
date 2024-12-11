<?php

use App\Models\UserSong;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_song', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idSong');

            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idSong')->references('id')->on('song');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(UserSong::TABLE_NAME);
    }
};
