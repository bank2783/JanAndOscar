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
        Schema::create('student_registers', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->text('address');
            $table->integer('tel')->nullable();
            $table->string('line_id')->nullable();
            $table->text('google_map_link');
            $table->string('education_level');
            $table->integer('status_id');
            $table->integer('school_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registers');
    }
};
