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
        Schema::create('educational_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id');
            $table->string('exam_id')->nullable();
            $table->string('university_id')->nullable();
            $table->string('board_id')->nullable();
            $table->string('result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_qualifications');
    }
};
