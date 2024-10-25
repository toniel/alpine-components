<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studios = [
            'Marvel Studios',
            'Pixar Animation Studios',
            'Walt Disney Studios',
            '20th Century Fox',
            'DC Extended Universe',
        ];
        foreach ($studios as $studios) {
            \App\Models\Studio::create([
                'name' => $studios,
            ]);
        }
    }
}
