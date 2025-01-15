<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDocument extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "driver_id",
        "document_name",
        "document_url",
        "document_expiry_date",
        "common_status_id",
    ];
}
