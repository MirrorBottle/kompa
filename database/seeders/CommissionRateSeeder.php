<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 3; $i++) {
            DB::table('commission_rates')->insert([
                [
                    'name' => "Komisi 5%",
                    'percentage' => 5,
                    'company_id' => $i,
                ],
                [
                    'name' => "Komisi 7%",
                    'percentage' => 7,
                    'company_id' => $i,

                ],
                [
                    'name' => "Komisi 10%",
                    'percentage' => 10,
                    'company_id' => $i,

                ],
                [
                    'name' => "Komisi 12%",
                    'percentage' => 12,
                    'company_id' => $i,

                ],
            ]);
        }
    }
}
