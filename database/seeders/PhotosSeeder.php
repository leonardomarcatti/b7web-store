<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdvertisesModel;
use App\Models\PhotosModel;


class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertises = AdvertisesModel::all();

        foreach ($advertises as $advertise) {
            // Garante pelo menos 3 fotos por anúncio
            $numPhotos = rand(3, 6); // Se quiser variar, aumente o número máximo

            for ($i = 0; $i < $numPhotos; $i++) {
                PhotosModel::create([
                    'url' => 'temp/myAds/game' . rand(1, 4) . '.png',
                    'mainPhoto' => $i === 0, // Primeira foto como principal
                    'advertise_id' => $advertise->id,
                ]);
            }
        }
    }
}
