<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistMovie extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistMovieFactory> */
    use HasFactory;
    protected $fillable = [
        'artist_id',
        'movie_id',
    ];
    protected $incrementing = false;
}
