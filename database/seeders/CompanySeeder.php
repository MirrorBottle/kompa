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
            'user_id'  => 12
        ]);

        // * UPDATE USERS COMPANY

        User::whereIn("id", range(2, 11))->update([
            "company_id" => 1
        ]);

        User::whereIn("id", range(12, 22))->update([
            "company_id" => 2
        ]);
    }
}
