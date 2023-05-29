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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->foreignId('user_id')->default(NULL)->nullable();
            $table->decimal('payment', 10, 2)->default(NULL)->nullable();
            $table->string('phone')->default(NULL)->nullable();
            $table->string('name')->default(NULL)->nullable();
            $table->string('username')->default(NULL)->nullable();
            $table->integer('months');
            $table->date('until')->default(NULL)->nullable();
            $table->boolean('accepted')->default(NULL)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
