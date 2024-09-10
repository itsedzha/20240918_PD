<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'artist',
        'genre',
    ];

    /**
     * The playlists that belong to the song.
     */
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
