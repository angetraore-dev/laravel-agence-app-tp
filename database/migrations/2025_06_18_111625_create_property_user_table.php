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
        Schema::create('property_user', function (Blueprint $table) {

            $table->foreignIdFor(Property::class)
                ->constrained('properties', 'id', 'property_id_fk')
                ->cascadeOnDelete();
            $table->foreignIdFor(User::class)
                ->constrained('users', 'id', 'user_id_fk')
                ->cascadeOnDelete();
            $table->primary(['property_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_user');
    }
};
