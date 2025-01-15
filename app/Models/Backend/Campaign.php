<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "phone",
        "email",
        "pickup_address",
        "dropoff_address",
        "flight_number",
        "departure_city",
        "pickup_date",
        "pickup_time",
        "car",
        "remark",
        "lead_type",
        "landing_page_identity",
        "status",
        "comment"
    ];
}
