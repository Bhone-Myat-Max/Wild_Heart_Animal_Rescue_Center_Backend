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
        Schema::create('treatments', function (Blueprint $table) {
            // Primary Key: treatment_id
            $table->id('treatment_id');

            // Foreign Key: animal_id
            // We must explicitly reference 'animal_id' because your animals table doesn't use 'id'
            $table->foreignId('animal_id')
                ->constrained('animals', 'animal_id')
                ->onDelete('cascade');

            // Foreign Key: user_id
            // Standard link to the Laravel users table
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Attributes from your diagram
            $table->string('diagnosis');
            $table->date('treatment_date'); // TreatmentDate
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
