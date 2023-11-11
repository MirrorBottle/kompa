<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['company_id', 'name', 'abbreviation', 'phone_number', 'email', 'address'];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
