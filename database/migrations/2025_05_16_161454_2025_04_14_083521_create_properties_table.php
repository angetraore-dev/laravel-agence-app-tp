<?php

use App\Models\Property;
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
        if ( ! Schema::hasTable('properties') ){

            Schema::create('properties', function (Blueprint $blueprint){
                $blueprint->id();
                $blueprint->string('title', '100');
                $blueprint->enum('type', ['maison', 'appartement', 'terrain']);
                $blueprint->integer('surface', false, true);
                $blueprint->integer('rooms', false, true);
                $blueprint->integer('bedrooms', false, true);
                $blueprint->integer('price', false, true);
                $blueprint->longText('description');
                $blueprint->string('city', '100');
                $blueprint->string('adress', '100');
                $blueprint->enum('status', ['complete', 'avaible', 'processing']);
                //$blueprint->foreignIdFor(User::class)
                //                    ->constrained(
                //                        'users',
                //                        'id',
                //                        'user_id_fk'
                //                    )->cascadeOnDelete()
                //                ;
                $blueprint->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
        Schema::table('maisons', function (Blueprint $blueprint){
            $blueprint->dropForeignIdFor(Property::class);
        });
        Schema::table('appartements', function (Blueprint $blueprint){
            $blueprint->dropForeignIdFor(Property::class);
        });
        Schema::table('terrains', function (Blueprint $blueprint){
            $blueprint->dropForeignIdFor(Property::class);
        });
    }
};
