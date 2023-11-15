<?php

namespace Database\Seeders;

use App\Models\UserCommissionRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCommissionRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            range(6, 11),
            range(16, 21)
        ];

        foreach ($users as $key => $user) {
            foreach ($user as $user_id) {
                UserCommissionRate::create([
                    'user_id' => $user_id,
                    'commission_rate_id' => $key == 0 ? rand(1, 4) : rand(5, 8),
                    'is_invalid' => 0
                ]);
            }
        }
    }
}
