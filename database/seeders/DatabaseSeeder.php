<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com'
        ]);
        Author::factory(5)->create();
        Book::factory(5)->create();
    }
}
