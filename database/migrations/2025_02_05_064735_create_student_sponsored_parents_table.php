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
        Schema::create('student_sponsored_parents', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('tel');
            $table->string('line_id');
            $table->string('google_map_link');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_sponsored_parents');
    }
};
