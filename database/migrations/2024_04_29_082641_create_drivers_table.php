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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->Text('driver_code')->nullable();
            $table->Text('name')->nullable();
            $table->Text('phone')->nullable();
            $table->Text('email')->nullable();
            $table->Text('license_number')->nullable();
            $table->unsignedBigInteger('driver_status_id')->nullable();
            $table->tinyInteger('availability')->nullable()->comment("1 = Available, 2 = Assigned");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
