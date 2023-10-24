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
        Schema::create('balance_book_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('balance_book_id');
            $table->string('name');
            $table->bigInteger('amount');
            $table->enum('type', [
                1, 2, 3, 4
            ])->comment('1 = Salary, 2 = Commission, 3 = Sales, 4 = Expense');
            $table->foreign('balance_book_id')->references('id')->on('balance_books')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_book_items');
    }
};
