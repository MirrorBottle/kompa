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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('balance_book_id')->nullable();
            $table->bigInteger('base_salary');
            $table->integer('commission_rate');
            $table->bigInteger('commission_amount');
            $table->enum('status', [
                1, 2, 3, 4, 5
            ])->comment('1 = Draft, 2 = Manager Approved, 3 = Finance Pending, 4 = Finance Approved, 5 = Finance Rejected');
            $table->text('manager_note')->nullable();
            $table->text('finance_note')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->date('approval_date')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('manager_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('balance_book_id')->references('id')->on('balance_books')->cascadeOnDelete();

            $table->index(['company_id', 'user_id', 'balance_book_id']);
            $table->index('company_id');
            $table->index('user_id');
            $table->index('balance_book_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
