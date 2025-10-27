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
        Schema::create('employeepayrolls', function (Blueprint $table) {
            $table->id();
            $table->String('employeeID');
            $table->string('position')->nullable();
            $table->string('employee_name')->nullable();
            $table->integer('days_attendance')->nullable();
            $table->decimal('daily_rate')->nullable();
            $table->decimal('total_basic_salary')->nullable();
            $table->decimal('holiday1')->nullable();
            $table->decimal('holiday2')->nullable();
            $table->decimal('holiday3')->nullable();
          //  $table->decimal('holiday4')->nullable();
            $table->decimal('allowance')->nullable();
            $table->decimal('adjustment')->nullable();
            $table->decimal('comsheme')->nullable();
            $table->decimal('used_leave')->nullable();
            $table->decimal('total_used_leave')->nullable();
            $table->decimal('ot_min')->nullable();
            $table->decimal('ot_pay')->nullable();
            $table->decimal('ut_min')->nullable();
            $table->decimal('ut_deduction')->nullable();
            $table->integer('late_min')->nullable();
            $table->decimal('late_deduction')->nullable();
            $table->decimal('total_salary')->nullable();
            $table->decimal('sss')->nullable();
            $table->decimal('philhealth')->nullable();
            $table->decimal('pagibig')->nullable();
            $table->decimal('sss_loan')->nullable();
            $table->decimal('hdmf_loan')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('cash_advance')->nullable();
            $table->decimal('other_deduction')->nullable();
            $table->decimal('total_deductions')->nullable();
            $table->decimal('net_pay')->nullable();
            $table->string('month');
            $table->string('cutoff');
            $table->string('year');
            $table->string('period');
            $table->date('upload_date');

                // set up the foreign key
            $table->foreign('employeeID')->references('employeeID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeepayrolls');
    }
};
