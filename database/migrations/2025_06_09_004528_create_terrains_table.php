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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->boolean('constructible')->default(false);
            $table->enum('zone', ['agricole', 'urbaine']);
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
        Schema::dropIfExists('terrains');
    }
};
