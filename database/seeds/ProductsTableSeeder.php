<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create(
            [
                'title' => 'Кружка',
                'description' => 'Кружка двухцветная DESERTOD',
                'category_id' => 13,
                'img' => 'https://storage.vsemayki.ru/images/0/1/1625/1625865/previews/people_3_mug_twotone_front_whitered_500.jpg',
                'price' => 470.00
            ]
        );

        \App\Product::create(
            [
                'title' => 'Фляга',
                'description' => 'Фляга DESERTOD',
                'category_id' => 13,
                'img' => 'http://storage.vsemayki.ru/images/0/1/1627/1627335/previews/people_1_flask_front_metal_250.jpg',
                'price' => 1125.00
            ]
        );

        \App\Product::create(
            [
                'title' => 'Накидка',
                'description' => 'Накидка на куртку 3D DESERTOD',
                'category_id' => 13,
                'img' => 'https://storage.vsemayki.ru/images/0/1/1627/1627339/previews/people_101_ski_cape_front_white_500.jpg',
                'price' => 1330.00
            ]
        );
    }
}
