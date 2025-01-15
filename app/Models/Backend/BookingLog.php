<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Job;

class BookingLog extends Model
{
    use HasFactory;

    protected $table = 'booking_logs';

    protected $fillable = [
        "ip",
        "browser",
        "os",
        "booking_id",
        "payment_code",
    ];

    public function getJob(){
        return $this->belongsTo(Job::class, 'booking_id', 'job_number');
    }
}
