<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->create([
            'user_id'  => 2
        ]);
        Company::factory()->create([
            'user_id'  => 3
        ]);

        // * UPDATE USERS COMPANY
        User::whereIn("id", [
            2, 4, 6, 7, 8, 9, 10, 11
        ])->update([
            "company_id" => 1
        ]);

        User::whereIn("id", [
            3, 5, 12, 13, 14, 15, 16, 17
        ])->update([
            "company_id" => 2
        ]);
    }
}
