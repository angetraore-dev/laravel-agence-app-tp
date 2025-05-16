<?php

namespace Database\Factories;

//use App\Models\RealEstateImg;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class RealEstateImgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['location' => "mixed"])]
    public function definition(): array
    {
        $location = fake()->filePath();
        return [
            'location' => $location
        ];
    }
}
