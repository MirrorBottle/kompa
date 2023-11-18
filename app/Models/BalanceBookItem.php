<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceBookItem extends Model
{
    use HasFactory;

    public $fillable = [
        'balance_book_id',
        'name',
        'amount',
        'type'
    ];

    public function getTypeNameAttribute($value)
    {
        switch ($this->type) {
            case 1:
                return 'Penggajian';
            case 2:
                return 'Komisi';
            case 3:
                return 'Penjualan';
            case 4:
                return 'Pengeluaran Lainnya';
            default:
                return '-';
        }
    }
}
