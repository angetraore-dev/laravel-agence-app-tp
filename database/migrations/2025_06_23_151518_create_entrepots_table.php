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
        Schema::create('entrepots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('stock_surface');
            $table->integer('hauteur_sous_plafond');
            $table->boolean('quai_de_chargement');
            $table->integer('poids_au_metre_carre_autorise');
            $table->boolean('normes_environnementales')->default(true);
            $table->boolean('normes_securite')->default(true);
            $table->foreignIdFor(Property::class)->constrained(
                'properties',
                'id',
                'property_id_fk'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepots');
    }
};
