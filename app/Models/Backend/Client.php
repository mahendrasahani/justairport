<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
      "name",
      "phone",
      "phone2",
      "email",
      "mobile_verified",
      "email_verified",
      "password",
      "phone_otp",
      "email_otp",
      "mobile_otp_timestamp",
      "email_otp_timestamp",
      "account_id",
      "popup_status",
      "user_id",
      "company_name",
      "employee_id",
      "address",
      "postal_code", 
      "profile_image"
    ];

    public function getJob(){
      return $this->hasOne(Job::class, 'client_id');
    }

    public function getAccount(){
      return $this->belongsTo(Account::class, 'account_id');
    }
}
