<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * The movies that belong to the Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class)->using(ArtistMovie::class);
    }
}
