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
        Schema::table('student_register_file_uploads', function (Blueprint $table) {
            $table->string('essay')->nullable()->change();
            $table->string('copy_of_birth_cercificate')->nullable()->change();
            $table->string('copy_of_id_card')->nullable()->change();
            $table->string('copy_of_house_registration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_register_file_uploads', function (Blueprint $table) {
            //
        });
    }
};
