<?php

use App\Models\BienImmobilier;
use App\Models\ProfilPro;
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
        Schema::create('bien_profil_pros', function (Blueprint $table) {
            $table->foreignIdFor(BienImmobilier::class)
            ->constrained(
                'bien_immobiliers',
                'id',
                'bien_immobiliers_id_fk'
            );
            $table->foreignIdFor(ProfilPro::class)
                ->constrained(
                    'profil_pro',
                    'id',
                    'profil_pro_id_fk'
            );
            $table->primary(['bien_immobilier_id', 'profil_pro_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_profil_pros');
    }
};
