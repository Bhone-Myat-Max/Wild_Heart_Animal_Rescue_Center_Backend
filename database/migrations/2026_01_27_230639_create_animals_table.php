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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('tagcode');
            $table->string('species');
            $table->string('gender');
            $table->string('estimated_age');
            $table->string('health_status');
            $table->foreignId('rescue_id');
            $table->date('rescue_date');
            $table->string('current_status'); // rescued, under_treatment, adopted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
