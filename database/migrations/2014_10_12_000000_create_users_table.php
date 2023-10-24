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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', [
                1, 2, 3, 4
            ])->comment('1 = Master, 2 = Admin, 3 = Finance, 4 = Manager, 5 = Pegawai');
            $table->bigInteger('base_salary')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
