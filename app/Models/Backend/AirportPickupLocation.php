<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirportPickupLocation extends Model
{
    use HasFactory;
    protected $fillable = [
       "airport_id",
       "pickup_point",
       "details",
       "common_status_id",
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'airport_pickup_location_id');
    }

    public function getAirport(){
        return $this->belongsTo(Airport::class, 'airport_id');
    }


}
