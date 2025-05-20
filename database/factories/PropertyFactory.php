<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->word(),
            "description" => fake()->word(),
            "surface" => fake()->numberBetween(14, 1000),
            "rooms" => fake()->numberBetween(1, 8),
            "bedrooms" => fake()->numberBetween(1, 4),
            "floor" => fake()->numberBetween(1, 2),
            "price" => fake()->numberBetween(3500000, 100000000),
            "city" => fake()->word(),
            "adress" => fake()->address(),
            "postal_code" => fake()->postcode(),
            "sold" => fake()->numberBetween(0, 1),
        ];
    }
}
