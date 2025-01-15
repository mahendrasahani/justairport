<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyType extends Model
{
    use HasFactory;

    protected $fillable = [
        "journey_type_value",
        "display_text",
    ];
}
