<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukus = [
            ['judul' => 'To Kill a Mockingbird', 'description' => 'A novel by Harper Lee set in the American South.'],
            ['judul' => '1984', 'description' => 'A dystopian novel by George Orwell.'],
            ['judul' => 'Pride and Prejudice', 'description' => 'A romantic novel by Jane Austen.'],
            ['judul' => 'The Catcher in the Rye', 'description' => 'A novel by J.D. Salinger.'],
            ['judul' => 'The Great Gatsby', 'description' => 'A novel by F. Scott Fitzgerald.'],
            ['judul' => 'One Hundred Years of Solitude', 'description' => 'A novel by Gabriel Garcia Marquez.'],
            ['judul' => 'Brave New World', 'description' => 'A dystopian novel by Aldous Huxley.'],
            ['judul' => 'The Hobbit', 'description' => 'A fantasy novel by J.R.R. Tolkien.'],
            ['judul' => 'The Lord of the Rings', 'description' => 'An epic high-fantasy novel by J.R.R. Tolkien.'],
            ['judul' => 'The Da Vinci Code', 'description' => 'A mystery thriller novel by Dan Brown.'],
            ['judul' => 'The Alchemist', 'description' => 'A novel by Paulo Coelho.'],
            ['judul' => 'Harry Potter and the Philosopher\'s Stone', 'description' => 'First book in the Harry Potter series by J.K. Rowling.'],
            ['judul' => 'The Adventures of Sherlock Holmes', 'description' => 'A collection of detective stories by Arthur Conan Doyle.'],
            ['judul' => 'Lord of the Flies', 'description' => 'A novel by William Golding.'],
            ['judul' => 'Animal Farm', 'description' => 'An allegorical novella by George Orwell.'],
            ['judul' => 'The Picture of Dorian Gray', 'description' => 'A novel by Oscar Wilde.'],
            ['judul' => 'Jane Eyre', 'description' => 'A novel by Charlotte Bronte.'],
            ['judul' => 'The Odyssey', 'description' => 'An ancient Greek epic poem attributed to Homer.'],
            ['judul' => 'Frankenstein', 'description' => 'A novel by Mary Shelley.'],
            ['judul' => 'Wuthering Heights', 'description' => 'A novel by Emily Bronte.'],
        ];
        foreach ($bukus as $buku) {
            Buku::create([
                'judul' => $buku['judul'],
                'deskripsi' => $buku['description'],
                'views' => rand(400,1000),
                'suka' => rand(1000,4000),
                'halaman' => rand(40,100),
                'favorit' => rand(90,200),
                // 'user_id' => $buku['user_id'],
                // 'genre_id' => $buku['genre_id']
            ]);
        }
       
    
    }
}
