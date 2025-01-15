<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'status'
    ];

}
