<?php

namespace Database\Seeders;

use App\Models\{Option, Property, RealEstateImg};
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('bonjour')
        ]);

        Property::factory()
            ->has(RealEstateImg::factory()->count(2))
            ->has(Option::factory(2))
            ->count(100)
            ->create()
        ;

        Option::factory(4)->create();
        //php artisan migrate:fresh --seed
    }
}
