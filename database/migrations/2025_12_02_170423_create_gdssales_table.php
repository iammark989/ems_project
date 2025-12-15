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
        Schema::create('gdssales', function (Blueprint $table) {
            $table->id();
            $table->string('itemno');
            $table->string('description');
            $table->decimal('quantity',8,2);
            $table->decimal('salesamount',8,2);
            $table->decimal('gprofit',8,2);
            $table->decimal('gprofitpercent',8,2);
            $table->string('itemcode');
            $table->string('monthname');
            $table->string('fiscalyear');
            $table->string('vendorcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gdssales');
    }
};
