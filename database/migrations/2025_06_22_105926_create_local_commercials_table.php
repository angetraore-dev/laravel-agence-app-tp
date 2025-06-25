<?php

use App\Models\LocalCommercial;
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
        Schema::create('local_commercials', function (Blueprint $table) {
            $table->id();
            $table->boolean('vitrine')->default(false);
            $table->boolean('parking_client')->default(false);
            $table->string('passerelle');//flux de client
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
        Schema::dropIfExists('local_commercials');
    }
};
