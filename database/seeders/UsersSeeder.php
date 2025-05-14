<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 54; $i++) {
            User::create(['name' => "User $i", 'email' => "user$i@test.com", 'state_id' => \rand(1, 27), 'password' => 'asd']);
        };
    }
}
