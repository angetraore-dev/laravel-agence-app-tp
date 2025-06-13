<?php

use App\Models\BienImmobilier;
use App\Models\Specificity;
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
        Schema::create('bien_immobilier_specificity', function (Blueprint $table) {
            $table->foreignIdFor(BienImmobilier::class)->constrained(
                'bien_immobiliers',
                'id',
                'bien_immobilier_id_fk'
            )->cascadeOnDelete();

            $table->foreignIdFor(Specificity::class)->constrained(
                'specificities',
                'id',
                'specificity_id_fk'
            )->cascadeOnDelete();
            $table->primary(['bien_immobilier_id', 'specificity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_immobilier_specificity');
    }
};
