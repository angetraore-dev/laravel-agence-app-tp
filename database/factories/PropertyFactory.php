<?php

namespace Database\Factories;

use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "title" => fake()->unique()->sentence(),
            'type' => PropertyType::MAISON,
            "description" => fake()->paragraph(),
            "surface" => fake()->numberBetween(14, 1000),
            "rooms" => fake()->numberBetween(1, 8),
            "bedrooms" => fake()->numberBetween(1, 4),
            "price" => fake()->numberBetween(3500000, 100000000),
            "city" => fake()->city(),
            "adress" => fake()->address(),
            "status" => PropertyStatus::AVAIBLE,
        ];
    }

    public function appartement():static
    {
        return $this->state(fn($attributes)=>[
            'type' => PropertyType::APPARTEMENT
        ]);
    }

    public function terrain():static
    {
        return $this->state(fn($attributes)=>[
            'type' => PropertyType::TERRAIN
        ]);
    }

    public function complete():static
    {
        return $this->state(fn($attributes)=>[
            'status' => PropertyStatus::COMPLETE
        ]);
    }

    public function processing():static
    {
        return $this->state(fn($attributes)=>[
            'status' => PropertyStatus::PROCESSING
        ]);
    }
}
