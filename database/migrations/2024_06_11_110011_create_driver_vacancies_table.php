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
        Schema::create('driver_vacancies', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('mobile_number')->nullable();
            $table->String('address')->nullable();
            $table->String('postal_code')->nullable();
            $table->String('email_address')->nullable();
            $table->String('car_model')->nullable();
            $table->String('car_year')->nullable(); 
            $table->tinyInteger('status')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_vacancies');
    }
};
