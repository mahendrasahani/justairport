<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "status",
        "message", 
    ];

 
}
