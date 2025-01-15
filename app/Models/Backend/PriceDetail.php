<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
         "basic_price",
         "congestion_charges",
         "parking_charges",
         "tax",
         "driver_basic_price",
         "driver_congestion_charges",
         "driver_parking_charges",
         "driver_tax",
         "total_price",
         "night_charge",
         "booster_seat_charge",
         "additional_charge",
         "discount",
         "net_price",
         "adjustment",
         "waiting_charge",
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'price_detail_id');
    }
}
