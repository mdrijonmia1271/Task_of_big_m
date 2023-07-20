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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('upazila_id');
            $table->longText('address');
            $table->string('language')->nullable();
            $table->string('photo')->default('default.png');
            $table->string('cv_attachment');
            $table->string('traning_name')->nullable();
            $table->string('traning_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
