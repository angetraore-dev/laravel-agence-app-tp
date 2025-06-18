<?php

namespace Database\Factories;

use App\Models\Appartement;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class AppartementFactory extends Factory
{
    protected $model = Appartement::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['floor' => "int", 'ascenceur' => "bool", 'balcon' => "bool"])]
    public function definition(): array
    {
        return [
            'floor' => fake()->numberBetween(0,100),
            'ascenceur'=> fake()->boolean(),
            'balcon' => fake()->boolean(),
        ];
    }
}
