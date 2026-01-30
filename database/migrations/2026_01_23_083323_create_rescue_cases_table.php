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

            $table->id(); // rescue_case_id
            $table->string('case_title');
            $table->string('reported_by')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->enum('priority_level', ['Low', 'Medium', 'High', 'Emergency'])->default('Low');
            $table->enum('case_status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            // $table->date('reported_date')->nullable();
            // $table->date('completed_date')->nullable();
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
