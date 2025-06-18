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
            $table->string('agence');
            $table->string('rccm');
            $table->string('cc');
            $table->string('abonnement');
            $table->timestamps();
            $table->foreignIdFor(User::class)->constrained(
                'users',
                'id',
                'user_id_fk'
                )
            ;
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
