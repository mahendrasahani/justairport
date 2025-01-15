<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverData extends Model
{
    use HasFactory;

    protected $table = "tbl_drivers_new";
    protected $primaryKey = 'did';
    public $timestamps = false;
}
