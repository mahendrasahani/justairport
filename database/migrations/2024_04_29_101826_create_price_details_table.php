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
        Schema::create('price_details', function (Blueprint $table) {
            $table->id();
            $table->Text('basic_price')->nullable();
            $table->Text('congestion_charges')->nullable();
            $table->Text('parking_charges')->nullable();
            $table->Text('tax')->nullable();
            $table->Text('driver_basic_price')->nullable();
            $table->Text('driver_congestion_charges')->nullable();
            $table->Text('driver_parking_charges')->nullable();
            $table->Text('driver_tax')->nullable();
            $table->Text('total_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_details');
    }
};
