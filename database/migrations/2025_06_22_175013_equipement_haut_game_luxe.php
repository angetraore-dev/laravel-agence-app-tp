<?php

use App\Models\EquipementHautGame;
use App\Models\Luxe;
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
        Schema::create('equipement_haut_game_luxe', function (Blueprint $table){
            $table->foreignIdFor(EquipementHautGame::class)->constrained(
                'equipement_haut_games',
                'id',
                'equipement_haut_game_id_fk'
            )->cascadeOnDelete();
            $table->foreignIdFor(Luxe::class)->constrained(
                'luxes',
                'id',
                'luxe_id_fk'
            )->cascadeOnDelete();

            $table->primary(['equipement_haut_game_id', 'luxe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('equipement_haut_game_luxe');
    }
};
