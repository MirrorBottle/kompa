<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $members = [];
        if(auth()->user()->team) {
            $members = TeamMember::where("team_id", auth()->user()->team->id)
                ->where('user_id', '!=', auth()->user()->id)
                ->paginate(6);
        }
        return view("manager.team.index");
    }
}
