<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserCommissionRate extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'commission_rate_id',
        'is_invalid',
        'invalid_date'
    ];

    public $casts = [
        'invalid_date' => 'date'
    ];

    public function commission() {
        return $this->belongsTo(CommissionRate::class, 'commission_rate_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
