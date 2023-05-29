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
        Schema::create('roomfacility', function (Blueprint $table) {
            $table->unsignedBigInteger('roomtype_id');
            $table->unsignedBigInteger('facility_id');
            $table->timestamps();

            $table->foreign('roomtype_id')->references('id')->on('roomtypes')->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomfacility');
    }
};
