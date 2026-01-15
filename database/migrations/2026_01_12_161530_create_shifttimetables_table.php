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
        Schema::create('shifttimetables', function (Blueprint $table) {
            $table->id();
            $table->string('shiftName');
            $table->time('onDutyTime');
            $table->time('offDutyTime');
            $table->time('beginningCin');
            $table->time('endingCin');
            $table->time('endingCout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifttimetables');
    }
};
