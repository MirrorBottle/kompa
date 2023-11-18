<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BalanceBook extends Model
{
    use HasFactory;

    public $guarded = [];
    public $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'finalized_date' => 'date'
    ];
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('currentCompany', function (Builder $builder) {
            $builder->where('company_id',  auth()->user()->company_id);
        });
    }


    public function items() {
        return $this->hasMany(BalanceBookItem::class);
    }
    public function getProfitAttribute() {
        return $this->sales_total - ($this->salary_total + $this->expanse_total);
    }
}
