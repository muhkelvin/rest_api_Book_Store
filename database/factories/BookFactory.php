<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100, 1000),
            'category_id' => rand(1,5),
            'author' => fake()->name(),
            'slug' => Str::slug($title),
        ];
    }
}
