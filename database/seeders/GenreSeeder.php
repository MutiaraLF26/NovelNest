<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// Mendefinisikan array dengan data kategori buku
$categories = [
    ['name' => 'Fiksi'],
    ['name' => 'Non-Fiksi'],
    ['name' => 'Sejarah'],
    ['name' => 'Sains'],
    ['name' => 'Teknologi'],
    ['name' => 'Bisnis'],
    ['name' => 'Self-Help'],
    ['name' => 'Seni'],
    ['name' => 'Pendidikan'],
    ['name' => 'Kesehatan'],
];

// Simulasi pembuatan data kategori menggunakan sintaks PHP
foreach ($categories as $category) {
    Genre::create([
        'name' => $category['name'],
    ]);
}

    }
}
