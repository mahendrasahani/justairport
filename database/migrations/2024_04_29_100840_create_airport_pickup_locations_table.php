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
        Schema::create('airport_pickup_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airport_id')->nullable();
            $table->Text('pickup_point')->nullable();
            $table->Text('details')->nullable();
            $table->unsignedBigInteger('common_status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airport_pickup_locations');
    }
};
