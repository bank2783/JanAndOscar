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
        Schema::create('student_parents_file_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('copy_of_house_registration');
            $table->string('copy_of_id_card');
            $table->integer('student_register_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents_file_uploads');
    }
};
