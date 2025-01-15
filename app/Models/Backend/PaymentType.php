<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        "payment_type_name"
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'payment_type_id');
    }
}
