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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nationality')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('origin')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('country')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city')->constrained('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status');
            $table->string('searching_for');
            $table->string('age');
//            $table->string('type_marriage');
            $table->string('weight');
            $table->string('height');
            $table->string('skin_colour');
            $table->string('physique');
            $table->string('religion');
            $table->string('religion_commitment');
            $table->string('prayer');
            $table->string('smoking');
            $table->string('beard');
            $table->string('educational_qualification');
            $table->string('financial_status');
            $table->string('employment');
            $table->string('job');
            $table->string('monthly_income');
            $table->string('health_status');
            $table->text('specifications_of_your_life_partner');
            $table->text('talk_about_your_self');

//            $table->integer('nationality')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
