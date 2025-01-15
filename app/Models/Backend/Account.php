<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "account_number",
        "account_name",
        "display_name",
        "address",
        "contact_name",
        "contact_phone",
        "account_id",
    ];

    public function getJob(){
        return $this->hasMany(Job::class, 'account_id');
    }

    public function getAccountStatusType(){
        return $this->belongsTo(AccountStatusType::class, 'account_status_type_id');
    }

    public function getClient(){
        return $this->hasMany(Client::class, 'account_id');
    }

    public function getInvoice(){
        return $this->hasOne(Invoice::class, 'account_id');
    }
}
