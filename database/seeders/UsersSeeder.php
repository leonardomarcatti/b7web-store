<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StatesModel;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $_sa;

    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create(['name' => "User $i", 'email' => "user$i@test.com", 'state_id' => StatesModel::pluck('id')->random(), 'password' => 'asd']);
        };
    }
}
