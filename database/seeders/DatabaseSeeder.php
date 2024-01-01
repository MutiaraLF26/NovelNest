<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Novel;
use App\Models\Kategori;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Mutiara admin',
            'email' => 'mutiaraadmin@gmail.com',
            'password' => bcrypt('12345789'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Mutiara',
            'email' => 'mutiara@gmail.com',
            'password' => bcrypt('12345789'),
            'role' => 'user',
        ]);
        Kategori::factory()->count(5)->create();
        Novel::factory()->count(50)->create();
    }
}
