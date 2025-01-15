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
        Schema::table('price_details', function (Blueprint $table) {
            $table->Text('night_charge')->after('congestion_charges')->nullable();
            $table->Text('booster_seat_charge')->after('night_charge')->nullable(); 
            $table->Text('additional_charge')->after('booster_seat_charge')->nullable();
            $table->Text('discount')->after('additional_charge')->nullable();
            $table->Text('net_price')->after('total_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_details', function (Blueprint $table) {
            
        });
    }
};
