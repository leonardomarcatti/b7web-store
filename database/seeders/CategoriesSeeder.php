<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriesModel;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alphabet = ['A', 'B', 'C', 'D', 'E'];
        for ($i = 0; $i <= 4; $i++) {
            CategoriesModel::create(['category' => "Categoria $alphabet[$i]"]);
        }
    }
}
