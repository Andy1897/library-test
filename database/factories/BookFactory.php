<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Book::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(20),
            'description' => $this->faker->text(100),
            'author_id' => rand(1, count(Author::all())),
            'created_at' => $this->faker->time()
        ];
    }
}
