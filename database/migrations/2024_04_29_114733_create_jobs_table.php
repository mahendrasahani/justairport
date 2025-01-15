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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journey_type_id')->nullable();
            $table->Text('address')->nullable();
            $table->Text('long')->nullable();
            $table->Text('latt')->nullable();
            $table->unsignedBigInteger('airport_id')->nullable();
            $table->unsignedBigInteger('airport_pickup_location_id')->nullable();
            $table->Text('distance')->nullable();
            $table->unsignedBigInteger('price_detail_id')->nullable();
            $table->Text('total_price')->nullable();
            $table->dateTime('job_date_time')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->unsignedBigInteger('car_category_id')->nullable();
            $table->Text('ref')->nullable();
            $table->Text('ref2')->nullable();
            $table->Text('passenger_name')->nullable();
            $table->Text('passenger_phone')->nullable();
            $table->Text('passenger_count')->nullable();
            $table->Text('hand_luggage_count')->nullable();
            $table->Text('checkin_luggage_count')->nullable();
            $table->Text('flight_number')->nullable();
            $table->Text('arrival_city')->nullable();
            $table->Text('car_park')->nullable();
            $table->Text('notes')->nullable();
            $table->Text('job_source')->nullable()->default('call');
            $table->Text('job_number')->nullable();
            $table->Text('taken_by')->nullable();
            $table->Text('allocated_by')->nullable();
            $table->Text('amended_by')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('job_status_type_id')->nullable();
            $table->Text('wating_time')->nullable();
            $table->dateTime('job_start_time')->nullable();
            $table->dateTime('job_complete_time')->nullable();
            $table->unsignedBigInteger('payment_detail_id')->nullable();
            $table->boolean('email_acknowledge_flag')->nullable();
            $table->dateTime('email_acknowledge_time')->nullable();
            $table->Text('call_out_req')->nullable();
            $table->Text('deadline_time')->nullable();
            $table->Text('job_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
