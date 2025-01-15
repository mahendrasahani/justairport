<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonStatus extends Model
{
    use HasFactory;

    protected $fillable = [
       "status_name",
    ];
}
