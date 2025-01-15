<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        "airport_name",
        "display_name",
        "long",
        "latt",
        "status"
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'airport_id');
    }

    public function getAirportPickupLocationList(){
        return $this->hasMany(AirportPickupLocation::class, 'airport_id');
    }
}
