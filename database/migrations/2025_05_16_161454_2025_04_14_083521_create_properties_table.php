<?php

use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if ( ! Schema::hasTable('properties') ){

            Schema::create('properties', function (Blueprint $blueprint){
                $blueprint->id();
                $blueprint->string('title', '100');
                $blueprint->enum('type', ['Immobilier Residentiel', 'Immobilier Commercial', 'Entrepôt', 'Terrain', 'Immobilier Mixte', 'Immobilier de Luxe', 'Immobilier Rural']);
                $blueprint->string('total_surface');
                $blueprint->string('city', '100');
                $blueprint->string('address', '100')->nullable();
                $blueprint->integer('price', false, true);//(Valeur marchande, prix de vente/location)
                $blueprint->date('building_date');//Annee de construction
                $blueprint->enum('legal_status', ['vente', 'location', 'viager']);//Statut juridique
                $blueprint->enum('property_condition', ['neuf', 'a_renover', 'renove']);//Etat du bien
                $blueprint->longText('describe');//Note supplémentaire
                $blueprint->enum('status', ['non_disponible', 'disponible', 'en_cours_d_acquisition']);//date de disponibilité
                $blueprint->date('date_disponibilite');
                $blueprint->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
        Schema::table('maisons', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('appartements', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('entrepots', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('terrains', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('bureaus', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('local_commercials', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('luxes', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('bien_rurals', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('vente', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('locations', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));
        Schema::table('viagers', fn(Blueprint $blueprint) => $blueprint->dropForeignIdFor(Property::class));

    }
};
