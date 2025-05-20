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
        if ( ! Schema::hasTable('properties') ){

            Schema::create('properties', function (Blueprint $blueprint){
                $blueprint->id();
                $blueprint->string('title', '100');
                $blueprint->longText('description');
                $blueprint->integer('surface', false, true);
                $blueprint->integer('rooms', false, true);
                $blueprint->integer('bedrooms', false, true);
                $blueprint->integer('floor', false, true);
                $blueprint->integer('price', false, true);
                $blueprint->string('city', '100');
                $blueprint->string('adress', '100');
                $blueprint->string('postal_code', '10');
                $blueprint->boolean('sold');
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
        Schema::table('real_estate_imgs', function (Blueprint $blueprint){
            $blueprint->dropForeignIdFor(Property::class);
        });
    }
};
