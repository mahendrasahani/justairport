<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverAccount extends Model
{
    use HasFactory;
    protected $table = 'driver_accounts';

    protected $fillable = [
         "driver_code",
         "start_date",
         "end_date",
         "total_jobs_count",
         "total_jobs_amount",
         "congestion_charge",
         "drop_off_charge",
         "parking_charge",
         "hotel_commission",
         "driver_earning",
         "rate_percent",
         "rent",
         "accounts_count",
         "topi_jobs_count",
         "driver_b_f",
         "parking_adjustment",
         "commission_adjustment",
         "other_adjustments",
         "adjustment_detail",
         "total",
         "payment_type",
         "payment_details",
         "payment",
         "balance_c_f",
         "remark",
         "driver_id"
    ];
    
}
