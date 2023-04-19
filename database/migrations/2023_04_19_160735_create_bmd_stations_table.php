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
        Schema::create('bmd_stations', function (Blueprint $table) {
            $table->id();
            $table->string("nid")->nullable();
            $table->integer("is_gts")->nullable();
            $table->integer("pointparent")->nullable();
            $table->string("name")->nullable();
            $table->string("nameBN")->nullable();
            $table->string("code")->unique();
            $table->float("loc_lat", 11, 8)->nullable();
            $table->float("loc_long", 11, 8)->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("location")->nullable();
            $table->string("description")->nullable();
            $table->integer("stOrder")->nullable();
            $table->string("timeUpdate")->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmd_stations');
    }
};
