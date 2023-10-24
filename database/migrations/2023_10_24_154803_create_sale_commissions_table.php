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
        Schema::create('sale_commissions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sale_id');
            $table->integer('commission_rate');
            $table->bigInteger('commission_amount');
            $table->date('validation_date');
            $table->date('approval_date');
            $table->text('note')->nullable();

            $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnDelete();

            $table->index('sale_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_commissions');
    }
};
