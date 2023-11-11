<?php

namespace App\Models;
use App\Models\Company;
use App\Models\Salary;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function salary() {
        return $this->belongsTo(Salary::class, 'salary_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
