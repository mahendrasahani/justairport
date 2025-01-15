<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        "postcode",
        "airport",
        "booking_type",
        "payment_type",
        "car_type",
        "price",
        "airport_id",
        "charges"
    ];
}
