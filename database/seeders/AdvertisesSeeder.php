<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AdvertisesModel;

class AdvertisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i <= 9; $i++) {
            AdvertisesModel::create([
                'title' => "Advertise $i",
                'slug' => "advertise-$i",
                'description' => "Anúncio $i",
                'contact' => rand(100000000, 999999999),
                'views' => rand(0, 1000),
                'price' => rand(1000, 100000) / 100, // Ex: 1743 / 100 = 17.43
                'user_id' => rand(1, 2),
                'category_id' => rand(1, 5),
                'negotiate' => (bool)rand(0, 1),
            ]);
        }
    }
}
