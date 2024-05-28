<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'id' => 1,
            'title' => fake()->sentence(1),
            'author' =>fake() ->paragraph(2),
            'publisher'=>fake()->paragraph(2),
            'status'=>fake()->paragraph(1),
        ];
    }
}
