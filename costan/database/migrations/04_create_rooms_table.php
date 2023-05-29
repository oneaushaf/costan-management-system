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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->integer('floor');
            $table->boolean('maintenance')->default(FALSE);
            $table->foreignId('roomtype_id')->constrained();
            $table->foreignId('user_id')->default(NULL)->nullable();
            $table->date('until')->default(NULL)->nullable();
            $table->timestamps();
        });
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->default(NULL)->nullable();
            $table->string('image')->default(NULL)->nullable();
            $table->string('alter')->default(NULL)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
