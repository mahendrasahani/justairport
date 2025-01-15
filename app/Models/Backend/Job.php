<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;    

    protected $casts = [
        'child_age' => 'array'
    ];
    protected $fillable = [
       "journey_type_id",
       "address",
       "long",
       "latt",
       "airport_id",
       "airport_pickup_location_id",
       "distance",
       "price_detail_id",
       "total_price",
       "job_date_time",
       "client_id",
       "account_id",
       "payment_type_id",
       "car_category_id",
       "ref",
       "ref2",
       "passenger_name",
       "passenger_phone",
       "passenger_count",
       "email", 
       "hand_luggage_count",
       "checkin_luggage_count",
       "flight_number",
       "arrival_city",
       "car_park",
       "notes",
       "job_source",
       "job_number",
       "taken_by",
       "allocated_by",
       "amended_by",
       "driver_id",
       "job_status_type_id",
       "wating_time",
       "job_start_time",
       "job_complete_time",
       "payment_detail_id",
       "email_acknowledge_flag",
       "email_acknowledge_time",
       "call_out_req",
       "deadline_time",
       "job_type", 
       "pre_booking", 
       "job_date",
       "job_day",
       "job_time",
       "deadline_date",
       "deadline_day",
       "comment",
       "additional_seat",
       "booster_seat_count",
       "child_age",
       "summary",
       "payment_reminder",
       "payment_reminder_count",
       "last_reminder_sent_date",
       "airport_terminal",
       "full_address",
       "postcode",
       "flight_number",
       "departure_city",
       "payment_status",
       "entry_after",
       "assigned_by",
       "topi_job",
       "drop_off_charge",
       "parking_collected",
       "cash_parking",
       "view_status"
    ];


    public function getAccount(){
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function getCarCategory(){
        return $this->belongsTo(CarCategory::class, 'car_category_id');
    }

    public function getDriver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function getClient(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getJobStatus(){
        return $this->belongsTo(JobStatusType::class, 'job_status_type_id');
    }
    
    public function getPaymentType(){
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function getAirport(){
        return $this->belongsTo(Airport::class, 'airport_id');
    }

    public function getTakenBy(){
        return $this->belongsTo(User::class, 'taken_by');
    }
    public function getAllocatedBy(){
        return $this->belongsTo(User::class, 'allocated_by');
    }
    public function getAssignedBy(){
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function getAmendedBy(){
        return $this->belongsTo(User::class, 'amended_by');
    }

    public function getAirportPickupLocation(){
        return $this->belongsTo(AirportPickupLocation::class, 'airport_pickup_location_id');
    }

    public function getBookingLog(){
        return $this->hasMany(BookingLog::class, 'booking_id', 'job_number');
    }

    public function getPriceDetail(){
        return $this->belongsTo(PriceDetail::class, 'price_detail_id');
    }
}
