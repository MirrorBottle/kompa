<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function members() {
        return $this->belongsToMany(User::class, 'team_members')->orderBy('role');
    }
}
