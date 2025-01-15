<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'address',
        'postcode',
        'email',
        'carmake',
        'caryear', 
    ];

    protected $table = 'tbl_apply_driver';
}
