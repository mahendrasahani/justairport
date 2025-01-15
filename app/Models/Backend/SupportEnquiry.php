<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'job_id',
        'message',
        'user_id',
        'status'
    ];
}
