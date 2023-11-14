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
    const ROLE_USER = 5;

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

    // * RELATIONSHIP
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members');
    }


    // * MUTATOR
    public function getTeamAttribute()
    {
        return $this->teams()->orderBy('id', 'desc')->first();
    }

    public function getRoleNameAttribute($value)
    {
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

    public function getRoleNameBadgeAttribute($value)
    {
        $class_name = '';
        switch ($this->role) {
            case self::ROLE_MASTER:
                $class_name = 'bg-blue-100 text-blue-800';
                break;
            case self::ROLE_ADMIN:
                $class_name = 'bg-red-100 text-red-800';
                break;
            case self::ROLE_FINANCE:
                $class_name = 'bg-green-100 text-green-800';
                break;
            case self::ROLE_MANAGER:
                $class_name = 'bg-yellow-100 text-yellow-800';
                break;
            case self::ROLE_USER:
                $class_name = 'bg-blue-100 text-blue-800';
                break;
        }
        return "<span class='$class_name text-sm font-medium me-2 px-4 py-1 rounded'>$this->role_name</span>";
    }

    public function getIsAdminAttribute()
    {
        return $this->role == self::ROLE_ADMIN;
    }
}
