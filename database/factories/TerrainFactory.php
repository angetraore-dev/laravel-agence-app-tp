<?php

namespace Database\Factories;

use App\Enums\TerrainZone;
use App\Models\Property;
use App\Models\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class TerrainFactory extends Factory
{
    protected $model = Terrain::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['constructible' => "bool", 'zone' => "string"])]
    public function definition(): array
    {
        return [
            'constructible' => fake()->boolean(),
            'zone' => TerrainZone::URBAINE,
        ];
    }

    public function zoneAgricole():static
    {
        return $this->state(fn($attributes) => [
            'zone' => TerrainZone::AGRICOLE
        ]);
    }

}
