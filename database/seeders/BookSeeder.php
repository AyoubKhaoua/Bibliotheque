<?php

namespace Database\Seeders;

use App\Models\Book;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()   // refers to BookFactory.php class
            ->count(10)
            ->create();
    }
}
