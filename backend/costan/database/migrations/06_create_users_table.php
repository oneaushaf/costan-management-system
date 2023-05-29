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
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('room_id')->default(NULL)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::create('contracts', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->default(NULL)->nullable()->constrained()->onDelete('cascade');
        //     $table->foreignId('room_id')->default(NULL)->nullable()->constrained()->onDelete('cascade');
        //     $table->date('end_date');
        //     $table->boolean('status')->default(FALSE);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('contracts');
    }
};
