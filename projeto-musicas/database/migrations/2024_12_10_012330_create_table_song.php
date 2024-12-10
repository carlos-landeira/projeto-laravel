<?php

use App\Models\Song;
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
        Schema::create(Song::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('album');
            $table->string('isrc');
            $table->enum('platform', ['spotify', 'deezer', 'youtube music', 'amazon music', 'apple music']);
            $table->string('trackId');
            $table->string('duration');
            $table->timestamp('addedDate');
            $table->string('addedBy')->nullable();
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Song::TABLE_NAME);
    }
};
