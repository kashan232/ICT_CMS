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
      Schema::create('district_offices', function (Blueprint $table) {
    $table->id();
    $table->string('district_name');
    $table->string('headquarters');
    $table->string('area');
    $table->string('population');
    $table->string('density');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_offices');
    }
};
