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
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->enum('home_type', ['Individuelle', 'Mitoyenne', 'Villa']);
            $table->integer('habitable_surface');
            $table->integer('nb_rooms');
            $table->integer('nb_bedrooms');
            $table->boolean('jardin')->default(false);
            $table->boolean('garage')->default(false);
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
        Schema::dropIfExists('maisons');
    }
};
