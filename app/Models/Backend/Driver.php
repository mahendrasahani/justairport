<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
       "driver_code",
       "name",
       "phone",
       "email",
       "license_number",
       "driver_status_id",
       "availability",
    ];

    

    public function getJob(){
        return $this->hasOne(Driver::class, 'driver_id');
    }

    public function getDriverStatus(){
        return $this->belongsTo(DriverStatus::class, 'driver_status_id');
    }

    public function getCarForDriver(){
        return $this->belongsTo(CarCategory::class, 'vehicle_Type');
    }
}
