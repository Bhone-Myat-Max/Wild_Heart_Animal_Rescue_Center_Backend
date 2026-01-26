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
        Schema::create('adopts', function (Blueprint $table) {
            // Primary Key from your diagram
            $table->id('adopt_id');

            // Foreign Key linking to animals table
            // We reference 'animal_id' because that is your primary key in the animals table
            $table->foreignId('animal_id')
                  ->constrained('animals', 'animal_id')
                  ->onDelete('cascade');

            // Attributes from your diagram
            $table->string('species');
            $table->string('adopted_by');
            $table->string('address');
            $table->string('email');
            $table->date('adopted_date'); // Fixed the 'Adpoted' typo from the image
            $table->string('phone_number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopts');
    }
};
