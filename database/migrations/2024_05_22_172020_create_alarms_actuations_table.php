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
        Schema::create('alarms_actuations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end')->nullable(); // on create, will be null until the alarm been turned off
            // relationships
            $table->unsignedBigInteger('alarm_id');
            $table->foreign('alarm_id')->references('id')->on('alarms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alarms_actuations');
    }
};
