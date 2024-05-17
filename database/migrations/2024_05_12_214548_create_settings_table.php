<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('active')->default(0);
            $table->json('nationality_messages')->nullable();
            $table->json('country_messages')->nullable();
            $table->tinyInteger('interest')->default(0);
            $table->tinyInteger('ignore')->default(0);
            $table->tinyInteger('visit')->default(0);
            $table->tinyInteger('images')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
