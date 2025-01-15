<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentResponseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "post_code",
        "order_id",
        "amount",
        "payment_status",
    ];
}
