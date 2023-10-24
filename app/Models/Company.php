<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(User::class, 'company_id');
    }

    public function departments() {
        return $this->hasMany(Department::class, 'company_id');
    }

    public function reports() {
        return $this->hasMany(Report::class, 'company_id');
    }

    public function teams() {
        return $this->hasMany(Team::class, 'company_id');
    }

}
