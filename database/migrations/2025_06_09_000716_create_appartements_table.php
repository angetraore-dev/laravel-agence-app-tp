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
            $table->integer('floor');
            $table->boolean('ascenceur')->default(false);
            $table->boolean('balcon')->default(false);
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
