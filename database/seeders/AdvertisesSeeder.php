<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdvertisesModel;
use App\Models\CategoriesModel;
use App\Models\User;

class AdvertisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 900; $i++) {
            AdvertisesModel::create([
                'title' => "Advertise $i",
                'slug' => "advertise-$i",
                'description' => "Anúncio $i",
                'contact' => rand(100000000, 999999999),
                'views' => rand(0, 1000),
                'price' => rand(1000, 100000) / 100, // Ex: 1743 / 100 = 17.43
                'user_id' =>  User::pluck('id')->random(),
                'category_id' => CategoriesModel::pluck('id')->random(),
                'negotiate' => (bool)rand(0, 1),
            ]);
        }
    }
}
