<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\StatesSeeder;
use Database\Seeders\AdvertisesSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\PhotosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([StatesSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([CategoriesSeeder::class]);
        $this->call([AdvertisesSeeder::class]);
        $this->call([PhotosSeeder::class]);
    }
}
