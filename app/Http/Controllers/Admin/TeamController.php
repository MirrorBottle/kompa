<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(10);
        return view("admin.teams.index", compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = User::where('company_id', auth()->user()->company_id)
            ->doesntHave('teams')
            ->where('role', User::ROLE_USER)
            ->get();
        $managers = User::where('company_id', auth()->user()->company_id)
            ->doesntHave('teams')
            ->where('role', User::ROLE_MANAGER)
            ->get();
        return view("admin.teams.create", compact('members', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member_ids = array_merge($request->member_ids, [$request->manager_id]);
        $team = Team::create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name
        ]);

        foreach ($member_ids as $member_id) {
            $team_member = TeamMember::create([
                'team_id' => $team->id,
                'user_id' => $member_id
            ]);
        }
        return redirect()->route('admin.teams.index')->with('success','Data tim berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $members = User::where('company_id', auth()->user()->company_id)
            ->doesntHave('teams')
            ->where('role', User::ROLE_USER)
            ->get();
        $managers = User::where('company_id', auth()->user()->company_id)
            ->doesntHave('teams')
            ->where('role', User::ROLE_MANAGER)
            ->get();
        return view("admin.teams.edit", compact('members', 'managers', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $member_ids = array_merge($request->member_ids, [$request->manager_id]);
        $team->update([
            'name' => $request->name
        ]);
        TeamMember::where("team_id", $team->id)->delete();
        foreach ($member_ids as $member_id) {
            $team_member = TeamMember::create([
                'team_id' => $team->id,
                'user_id' => $member_id
            ]);
        }
        return redirect()->route('admin.teams.index')->with('success','Data tim berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success','Data tim berhasil dihapus!');
    }
}
