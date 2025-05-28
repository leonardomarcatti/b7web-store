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

    private function  removerAcentos($texto)
    {
        return preg_replace(
            '/[^A-Za-z0-9\-]/',
            '',
            iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto)
        );
    }

    public function run(): void
    {
        $categories = ['Carros', 'Eletronicos', 'Roupas', 'Esportes', 'Bebês'];

        foreach ($categories as $key => $value) {
            CategoriesModel::create(['category' => $value, 'slug' => \strtolower($this->removerAcentos($value))]);
        }
    }
}
