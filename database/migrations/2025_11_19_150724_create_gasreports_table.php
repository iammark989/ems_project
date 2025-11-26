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
        Schema::create('gasreports', function (Blueprint $table) {
            $table->id();
            $table->date('transdate');
            $table->string('transnumber');
            $table->string('ponumber');
            $table->string('vehicle');
            $table->string('product');
            $table->decimal('quantity',8,2);
            $table->decimal('price',8,2);
            $table->decimal('totalamount',8,2);
            $table->string('driver');
            $table->string('destination');
            $table->string('company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasreports');
    }
};
