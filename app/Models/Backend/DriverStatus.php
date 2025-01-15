<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverStatus extends Model
{
    use HasFactory;

    protected $fillable = [
      "status_name"
    ];

    public function getDriver(){
      return $this->hasOne(Driver::class, 'driver_status_id');
    }
}
