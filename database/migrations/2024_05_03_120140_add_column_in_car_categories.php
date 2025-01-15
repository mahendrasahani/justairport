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
        Schema::table('car_categories', function (Blueprint $table) {
            $table->bigInteger('passenger_count')->nullable()->after('short_name');
            $table->bigInteger('large_luggage_count')->nullable()->after('passenger_count');
            $table->bigInteger('small_luggage_count')->nullable()->after('large_luggage_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_categories', function (Blueprint $table) {
            //
        });
    }
};
