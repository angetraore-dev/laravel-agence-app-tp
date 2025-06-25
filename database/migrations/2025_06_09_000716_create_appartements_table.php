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
        Schema::create('appartements', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_rooms');
            $table->integer('nb_bedrooms');
            $table->enum('floor', ['Rez-de-chaussee', '1er etage', 'Dernier etage', 'Autres etages']);
            $table->boolean('ascenceur')->default(true);
            $table->boolean('balcon')->default(true);
            $table->boolean('parking')->default(true);
            $table->timestamps();
            $table->foreignIdFor(Property::class)
                ->constrained(
                    'properties',
                    'id',
                    'property_id_fk'
                )->cascadeOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartements');
    }
};
