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
        Schema::create('balance_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name')->unique();
            $table->bigInteger('sales_total');
            $table->bigInteger('salary_total');
            $table->bigInteger('expanse_total');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('finalized_date');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_books');
    }
};
