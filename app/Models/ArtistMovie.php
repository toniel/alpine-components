<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArtistMovie extends Pivot
{
    /** @use HasFactory<\Database\Factories\ArtistMovieFactory> */
    use HasFactory;
    protected $fillable = [
        'artist_id',
        'movie_id',
    ];
    public $table = 'artist_movies';
    public $incrementing = false;
}
