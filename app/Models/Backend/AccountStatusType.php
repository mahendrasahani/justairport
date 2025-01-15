<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStatusType extends Model
{
    use HasFactory;

    protected $fillable = [
      "status_name"
    ];


    public function getAccount(){
      return $this->hasOne(Account::class, 'account_status_type_id');
    }
}
