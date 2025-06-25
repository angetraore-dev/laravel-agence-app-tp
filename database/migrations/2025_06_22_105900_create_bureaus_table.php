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
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_meeting');//nb_salle_reunion
            $table->boolean('cafetria')->default(false);
            $table->boolean('accueil')->default(false);
            $table->string('passerelle');//flux de client
            $table->longText('describe');
            $table->foreignIdFor(Property::class)->constrained(
                'properties',
                'id',
                'property_id_fk'
            )->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureaus');
    }
};
