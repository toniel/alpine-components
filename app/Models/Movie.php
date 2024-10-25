<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'synopsis',
        'year',
        'studio_id'
    ];

    /**
     * Get the studio that owns the Movie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class)->using(ArtistMovie::class);
    }
}
