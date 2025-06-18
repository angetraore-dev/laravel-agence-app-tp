<?php

namespace Database\Seeders;

use App\Models\{Property, Appartement, Maison, Terrain, Option, User, ProfilPro };
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Scenario 1:
         * (02) utilisateur de type PRO chacun (01) PROFILPRO ayant (03) PROPRIETES
         * DE TYPE TERRAIN AVEC LE STATUS EN COURS D'ACHATS (PROCESSING) AYANT (02) OPTIONS CHACUNE
         */
        User::factory(2)
            ->has(ProfilPro::factory())
            ->has(
                Property::factory(3)->terrain()->processing()
                    ->has(Terrain::factory()->zoneAgricole())
                    ->has(Option::factory(2))
            )
            ->create()
        ;

        /**
         * Scenario 2:
         * (01) Un utilisateur de type PARTICULIER ayant (3) PROPIETES de types
         * APPARTEMENTS avec (01) une OPTION chacune AYANT LE STATUS (AVAIBLE)
         */
        User::factory(1)->userParticulier()
            ->has(
                Property::factory(3)->appartement()
                    ->has(Appartement::factory())
                    ->has(Option::factory(1))
            )
            ->create()
        ;
        //php artisan db:seed
        //php artisan migrate:fresh --seed
    }
}
