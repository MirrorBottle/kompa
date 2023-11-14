<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Team extends Model
{
    use HasFactory;

    public $fillable = [
        'company_id',
        'name'
    ];
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('currentCompany', function (Builder $builder) {
            $builder->where('company_id',  auth()->user()->company_id);
        });
    }

    // * RELATIONSHIP
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function members() {
        return $this->belongsToMany(User::class, 'team_members')->orderBy('role');
    }

    // * MUTATORS
    public function getManagerAttribute() {
        return $this->members()->where('users.role', User::ROLE_MANAGER)->first();
    }

    public function getUsersAttribute() {
        return $this->members()->where('users.role', User::ROLE_USER)->get();
    }
}
