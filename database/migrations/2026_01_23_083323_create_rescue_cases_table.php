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
        Schema::create('rescue_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('species');
            $table->string('reported_by');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('description');
            $table->date('rescue_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_cases');
    }
};
