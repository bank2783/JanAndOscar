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
        Schema::create('student_sponsoreds', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('tel')->nullable();
            $table->string('line_id')->nullable();
            $table->string('adress');
            $table->string('education_level');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_sponsoreds');
    }
};
