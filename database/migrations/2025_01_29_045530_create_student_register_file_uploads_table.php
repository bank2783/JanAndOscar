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
        Schema::create('student_register_file_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('essay');
            $table->string('copy_of_birth_cercificate');
            $table->string('copy_of_id_card');
            $table->string('copy_of_house_registration');
            $table->integer('student_register_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_register_file_uploads');
    }
};
