<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CommissionRate extends Model
{
    use HasFactory;
    public $fillable = [
        'company_id',
        'name',
        'percentage'
    ];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('currentCompany', function (Builder $builder) {
            $builder->where('company_id',  auth()->user()->company_id);
        });
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_commission_rates');
    }

    public function getActiveUsersAttribute() {
        return $this->users()->where('is_invalid', 0)->get();
    }
}
