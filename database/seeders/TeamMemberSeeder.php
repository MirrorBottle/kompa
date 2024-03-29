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
        $teams = [
            array_merge([4], range(6, 8)),
            array_merge([5], range(9, 11)),
            array_merge([14], range(16, 18)),
            array_merge([15], range(19, 21))
        ];

        foreach ($teams as $team_key => $team) {
            foreach ($team as $user_id) {
                TeamMember::insert([
                    'team_id' => $team_key + 1,
                    'user_id' => $user_id,
                ]);
            }
        }
    }
}
