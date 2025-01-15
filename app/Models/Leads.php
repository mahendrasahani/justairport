<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        "from",
        "to",
        "passenger_count",
        "phone",
        "journey_type",
        "status"
    ];
}
