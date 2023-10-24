<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // * MASTER
        User::factory()->create([
            'name'  => 'Master',
            'email' => 'master@hazzy.id',
            'role'  => 1
        ]);
        // * ADMIN
        User::factory()->create([
            'name'  => 'admin1',
            'email' => 'admin1@gmail.com',
            'role'  => 2
        ]);
        User::factory()->create([
            'name'  => 'admin2',
            'email' => 'admin2@gmail.com',
            'role'  => 2
        ]);
        // * PJO
        User::factory()->count(2)->create([
            'role' => 3
        ]);
        // * USER
        User::factory()->count(12)->create([
            'role' => 4
        ]);
    }
}
