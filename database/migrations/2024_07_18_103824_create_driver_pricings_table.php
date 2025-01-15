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
        Schema::create('driver_pricings', function (Blueprint $table) {
            $table->id();
            $table->String('threshold_limit')->nullable();
            $table->String('sharing_perc_before')->nullable();
            $table->String('sharing_perc_after')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_pricings');
    }
};
