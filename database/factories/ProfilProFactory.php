<?php

namespace Database\Factories;

use App\Models\ProfilPro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ProfilProFactory extends Factory
{
    protected $model = ProfilPro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['agence' => "string", 'rccm' => "string", 'cc' => "string", 'abonnement' => "string"])]
    public function definition(): array
    {
        return [
            'agence' => fake()->word(),
            'rccm' => fake()->word(),
            'cc' => fake()->word(),
            'abonnement' => fake()->word(),
            //'user_id' => User::factory(null, ['id'])
        ];
    }

}
