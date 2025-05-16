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
        //"id" integer primary key autoincrement not null,
        //  "title" varchar not null,
        //  "description" text not null,
        //  "surface" integer not null,
        //  "rooms" integer not null,
        //  "bedrooms" integer not null,
        //  "floor" integer not null,
        //  "price" integer not null,
        //  "city" varchar not null,
        //  "adress" varchar not null,
        //  "postal_code" varchar not null,
        //  "sold" tinyint(1) not null,
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
