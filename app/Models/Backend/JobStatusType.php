<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatusType extends Model
{
    use HasFactory;

    protected $fillable = [
     "status_name"
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'job_status_type_id');
    }
}
