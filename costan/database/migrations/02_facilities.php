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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('facility_roomtype', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id');
            $table->unsignedBigInteger('roomtype_id');
            $table->timestamps();

            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->foreign('roomtype_id')->references('id')->on('roomtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomtypefacility');
        Schema::dropIfExists('facilities');
    }
};
