<?php

use App\Models\Luxe;
use App\Models\Securite;
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
        //
        Schema::create('securite_luxe', function (Blueprint $table){
            $table->foreignIdFor(Securite::class)->constrained(
                'securites',
                'id',
                'securite_id_fk'
            )->cascadeOnDelete();
            $table->foreignIdFor(Luxe::class)->constrained(
                'luxes',
                'id',
                'luxe_id_fk'
            )->cascadeOnDelete();

            $table->primary(['securite_id', 'luxe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('securtie_luxe');
    }
};
