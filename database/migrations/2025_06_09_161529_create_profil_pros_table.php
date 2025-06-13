<?php

use App\Models\User;
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
        Schema::create('profil_pros', function (Blueprint $table) {
            $table->id();
            $table->string('agence')->unique();
            $table->string('rccm');
            $table->string('cc');
            $table->string('abonnement');
            $table->foreignId('user_id')
                ->constrained(
                    'users',
                    'id',
                    'user_id_fk'
                )
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_pros');
    }
};
