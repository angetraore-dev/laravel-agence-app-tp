<?php

namespace Database\Factories;

use App\Models\Maison;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Maison>
 */
class MaisonFactory extends Factory
{
    protected $model = Maison::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['nb_etages' => "int", 'jardin' => "bool", 'garage' => "bool"])] public function definition(): array
    {
        return [
            'nb_etages' => fake()->numberBetween(0,100),
            'jardin' => fake()->boolean(),
            'garage' => fake()->boolean(),
        ];
    }
}
