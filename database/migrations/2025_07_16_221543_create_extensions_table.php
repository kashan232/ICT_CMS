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
     Schema::create('extensions', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->longText('description')->nullable();
    $table->string('point_one')->nullable();
    $table->string('point_two')->nullable();
    $table->string('point_three')->nullable();
    $table->string('main_image')->nullable();
    $table->string('small_image')->nullable();
    $table->timestamps();
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extensions');
    }
};
