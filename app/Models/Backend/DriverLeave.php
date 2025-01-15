<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        "driver_id",
        "start_date",
        "end_date",
    ];
}
