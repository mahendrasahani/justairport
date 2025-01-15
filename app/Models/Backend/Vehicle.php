<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
       "vehicle_number",
       "pollution_end_date",
       "insurance_end_date",
       "vehicle_model",
       "engine_number",
       "car_registration_doc",
       "driver_id",
       "common_status_id",
       "car_categories_id",
    ];
}
