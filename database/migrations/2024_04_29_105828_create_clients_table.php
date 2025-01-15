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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->Text('name')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->bigInteger('email')->nullable();
            $table->boolean('mobile_verified')->nullable();
            $table->boolean('email_verified')->nullable();
            $table->Text('password')->nullable();
            $table->Text('mobile_otp')->nullable();
            $table->Text('email_otp')->nullable();
            $table->dateTime('mobile_otp_timestamp')->nullable();
            $table->dateTime('email_otp_timestamp')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
