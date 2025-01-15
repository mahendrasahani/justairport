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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('phone')->nullable();
            $table->String('email')->nullable();
            $table->Text('pickup_address')->nullable();
            $table->Text('dropoff_address')->nullable();
            $table->String('flight_number')->nullable();
            $table->String('departure_city')->nullable();
            $table->date('pickup_date')->nullable();
            $table->String('pickup_time')->nullable();
            $table->String('car')->nullable();
            $table->String('remark')->nullable();
            $table->String('lead_type')->nullable();
            $table->String('landing_page_identity')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
