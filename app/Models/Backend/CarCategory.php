<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    protected $fillable = [
       "name",
       "short_name",
       "passenger_count",
       "large_luggage_count",
       "small_luggage_count",
       "status",
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'car_category_id');
    }

    public function getDriverFromCar(){
        return $this->hasOne(Driver::class, 'vehicle_Type');
    }
    
}
