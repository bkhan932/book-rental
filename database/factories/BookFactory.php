<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $categories = ['Fiction', 'Non-Fiction', 'Science Fiction', 'Mystery', 'Fantasy', 'Romance', 'Thriller', 'Biography'];
        $titles = ['The Great Gatsby', 'To Kill a Mockingbird', '1984', 'Pride and Prejudice', 'The Catcher in the Rye', 'The Hobbit'];

        $bookTitle = $this->faker->randomElement($titles);
        $bookCategory = $this->faker->randomElement($categories);
        return [
            'name' => $bookTitle,
            'author' => $this->faker->name,
            'published_date' => $this->faker->date,
            'publisher' => $this->faker->company,
            'pages' => $this->faker->numberBetween(100, 500),
            'category' => $bookCategory,
        ];
    }
}
