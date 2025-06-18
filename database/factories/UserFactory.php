<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //bcrypt('bonjour')
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'type' => UserType::PRO,
            'adresse' => fake()->address(),
            'status' => fake()->boolean(),
            'password' => static::$password ??= Hash::make('password'),
            'password_confirmation' => static::$password,
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ];
    }

    public function unverified():static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null
        ]);
    }

    public function userParticulier():static
    {
        return $this->state(fn($attributes) => [
            'type' => UserType::PARTICULIER
        ]);
    }

    public function userACQUEREUR():static
    {
        return $this->state(fn($attributes) => [
            'type' => UserType::ACQUEREUR
        ]);
    }

}
