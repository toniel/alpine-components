<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = Movie::create([
            "title"=> "Justice League",
            "synopsis" => "Justice League adalah film pahlawan super Amerika Serikat produksi tahun 2017 yang diangkat dari DC Comics superhero dengan judul yang sama",
            "year"=>2017,
            "studio_id"=>5
        ]);

        $movie->artists()->attach([10,11,12,13,14,15]);
    }
}
