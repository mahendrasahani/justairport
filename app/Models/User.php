<?php

namespace App\Models;

use App\Models\Backend\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'username',
        'phone',  // Added phone
        'profile',  // Added profile_photo_path
        'otp',  // Added profile_photo_path
        'role_id',   
        'otp_status',   
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJob(){
        return $this->hasOne(Job::class, 'taken_by');
    }

    /**
     * Accessor for profile photo URL.
     *
     * @return string|null
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path ? Storage::url($this->profile_photo_path) : url('public/assets/backend/images/user.png');
    }
}
