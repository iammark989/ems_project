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
        Schema::create('cutoff_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('startDate_1');
            $table->integer('startDate_2');
            $table->integer('startDate_3');
            $table->integer('startDate_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutoff_settings');
    }
};
