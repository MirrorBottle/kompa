<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public $fillable = [
        'user_id',
        'team_id'
    ];
    use HasFactory;
}
