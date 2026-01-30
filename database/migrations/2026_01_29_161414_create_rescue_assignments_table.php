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
        Schema::create('rescue_assignments', function (Blueprint $table) {
             $table->id(); // assignment_id

            $table->foreignId('rescue_case_id');
            $table->foreignId('user_id');
            // $table->foreignId('assigned_by')->constrained('users'); // admin who assigned
            // $table->dateTime('assigned_date')->nullable();
            // $table->string('role_in_case')->nullable(); // Driver, Handler
            // $table->enum('assignment_status', ['Assigned', 'Completed'])->default('Assigned');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_assignments');
    }
};
