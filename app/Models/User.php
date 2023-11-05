<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    const ROLE_MASTER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_FINANCE = 3;
    const ROLE_MANAGER = 4;
    const ROLE_USER = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        'password' => 'hashed',
    ];

    public function getRoleNameAttribute($value) {
        switch ($this->role) {
            case self::ROLE_MASTER:
                return 'master';
            case self::ROLE_ADMIN:
                return 'admin';
            case self::ROLE_FINANCE:
                return 'finance';
            case self::ROLE_MANAGER:
                return 'manager';
            case self::ROLE_USER:
                return 'user';
            default:
                return null;
        }
    }
}
