<?php

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
        Schema::create('bien_immobiliers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['maison', 'appartement','terrain']);
            $table->integer('surface');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->string('city');
            $table->string('adresse');
            $table->integer('price');
            $table->text('description');
            $table->enum('sold', ['complete', 'avaible', 'processing']);
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
        Schema::dropIfExists('bien_immobiliers');
    }
};
