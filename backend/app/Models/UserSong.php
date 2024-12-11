<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSong extends Model
{
    /**
     * Table name associated in database.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUser',
        'idSong'
    ];

    /**
     * Remove timestamps from table.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table name in database.
     *
     * @var string
     */
    const TABLE_NAME = 'user_song';
}
