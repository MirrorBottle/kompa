<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($user_id=6; $user_id <= 8; $user_id++) {
            TeamMember::insert([
                'team_id' => 1,
                'user_id' => $user_id,
                'is_team_leader' => $user_id == 6
            ]);
        }

        for ($user_id=9; $user_id <= 11; $user_id++) {
            TeamMember::insert([
                'team_id' => 2,
                'user_id' => $user_id,
                'is_team_leader' => $user_id == 9
            ]);
        }

        for ($user_id=12; $user_id <= 14; $user_id++) {
            TeamMember::insert([
                'team_id' => 3,
                'user_id' => $user_id,
                'is_team_leader' => $user_id == 12
            ]);
        }

        for ($user_id=15; $user_id <= 17; $user_id++) {
            TeamMember::insert([
                'team_id' => 4,
                'user_id' => $user_id,
                'is_team_leader' => $user_id == 15
            ]);
        }
    }
}
