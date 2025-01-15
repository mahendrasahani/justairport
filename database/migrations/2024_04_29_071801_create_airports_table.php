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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->Text('airport_name')->nullable();
            $table->Text('display_name')->nullable();
            $table->Text('long')->nullable();
            $table->Text('latt')->nullable();
            $table->tinyInteger('status')->nullable()->comment("0 = InActive, 1 = Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
