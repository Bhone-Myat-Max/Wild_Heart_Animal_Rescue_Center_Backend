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
            // Set custom primary key to match your diagram
            $table->id('animal_id');

            // Attributes from your earlier schema
            $table->string('tagcode_name');
            $table->string('species');
            $table->string('gender')->nullable();
            $table->string('estimated_age')->nullable();
            $table->string('health_status')->nullable();

            // Link to the rescue_cases table
            $table->foreignId('rescue_id')
                  ->nullable()
                  ->constrained('rescue_cases')
                  ->onDelete('cascade');

            $table->date('rescue_date');
            $table->string('current_status');

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
