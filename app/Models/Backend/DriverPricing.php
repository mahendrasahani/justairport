<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        "threshold_limit",  
        "sharing_perc_before",  
        "sharing_perc_after",  
        "status",  
    ];
}
