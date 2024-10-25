<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            'Robert Downey Jr.',
            'Chris Evans',
            'Chris Hemsworth',
            'Mark Ruffalo',
            'Scarlett Johansson',
            'Tom Holland',
            'Jeremy Renner',
            'Elizabeth Olsen',
            'Benedict Cumberbatch',
            'Henry Cavill',
            'Ben Affleck',
            'Gal Gadot',
            'Chris Pine',
            'Ezra Miller',
            'Jason Momoa',
        ];

        foreach ($artists as $artist) {
            \App\Models\Artist::create([
                'name' => $artist,
            ]);
        }
    }
}
