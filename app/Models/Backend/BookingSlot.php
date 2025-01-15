<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSlot extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'start_date_time',
        'end_date_time',
        'status'
    ];
}
