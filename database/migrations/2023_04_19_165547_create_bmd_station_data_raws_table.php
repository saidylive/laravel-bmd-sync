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
        Schema::create('bmd_station_data_raws', function (Blueprint $table) {
            $table->id();
            $table->string("stCode")->nullable();
            $table->dateTime("date_time")->nullable();
            $table->float("maximum_temp", 4, 1)->nullable();
            $table->float("minimum_temp", 4, 1)->nullable();
            $table->float("dry_bulb", 4, 1)->nullable();
            $table->float("humidity" ,4, 1)->nullable();
            $table->float("rainfall", 4, 1)->nullable();
            $table->float("rainfall_3", 4, 1)->nullable();
            $table->float("rainfall_6", 4, 1)->nullable();
            $table->float("rainfall_24", 4, 1)->nullable();
            $table->integer("r_day")->nullable();
            $table->integer("r_hour")->nullable();
            $table->string("update_by")->nullable();
            $table->string("status")->nullable();
            $table->dateTime("timeUpdate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmd_station_data_raws');
    }
};
