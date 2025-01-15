<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'invoice_number',
        'job_count',
        'account_id',
        'total_amount'
    ];

    public function getAccount(){
        return $this->belongsTo(Account::class, 'account_id');
    }
}
