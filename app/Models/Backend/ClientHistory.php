<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHistory extends Model
{
    use HasFactory;
    protected $table = 'client_history'; 
    
     protected $fillable = [
        "id",
        "recid",
        "client",
        "name",
        "telephone",
        "reference",
        "address",
        "email_address",
        "pcode",
        "addr_number",
        "overwrite_con",
        "overwrite_tel",
        "overwrite_ref",
        "overwrite_ref2",
        "overwrite_pin",
        "overwrite_addr",
        "notes1",
        "profile_id",
        "last_chg_date",
        "last_chg_time",
        "last_chg_secs",
        "overwrite_pass	",
        "overwrite_ptel",
    ];
}
