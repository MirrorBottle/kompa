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
        Schema::create('user_commission_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('commission_rate_id');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('commission_rate_id')->references('id')->on('commission_rates')->cascadeOnDelete();
            $table->boolean('is_invalid')->default(0);
            $table->date('invalid_date');

            $table->index(['user_id', 'commission_rate_id']);
            $table->index('user_id');
            $table->index('commission_rate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_commission_rates');
    }
};
