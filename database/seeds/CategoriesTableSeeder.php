<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Category::create(
            [
                'name' => 'Свой Дизайн',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Мужчинам',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Женщинам',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Детям',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Аксессуары',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Чехлы',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Интерьер',
                'parent_id' => null
            ]
        );

        \App\Category::create(
            [
                'name' => 'Подарки',
                'parent_id' => null
            ]
        );
        //То что входит в категорию 'Свой Дизайн'
        \App\Category::create(
            [
                'name' => 'Мужчинам',
                'parent_id' => 1
            ]
        );

        \App\Category::create(
            [
                'name' => 'Женщинам',
                'parent_id' => 1
            ]
        );

        \App\Category::create(
            [
                'name' => 'Детям',
                'parent_id' => 1
            ]
        );

        \App\Category::create(
            [
                'name' => 'Чехлы',
                'parent_id' => 1
            ]
        );

        \App\Category::create(
            [
                'name' => 'Аксессуары',
                'parent_id' => 1
            ]
        );

        \App\Category::create(
            [
                'name' => 'Для дома',
                'parent_id' => 1
            ]
        );
        //то ЧТО входит в категорию 'для Мужчинам '
        \App\Category::create(
            [
                'name' => 'Футболки',
                'parent_id' => 2
            ]
        );

        \App\Category::create(
            [
                'name' => 'Толстовки',
                'parent_id' => 2
            ]
        );

        \App\Category::create(
            [
                'name' => 'Верхняя одежда',
                'parent_id' => 2
            ]
        );
        \App\Category::create(
            [
                'name' => 'Майки',
                'parent_id' => 2
            ]
        );

        \App\Category::create(
            [
                'name' => 'Шорты и брюки',
                'parent_id' => 2
            ]
        );

        \App\Category::create(
            [
                'name' => 'Аксессуары',
                'parent_id' => 2
            ]
        );
        //то ЧТО входит в категорию 'для Женщинам'
        \App\Category::create(
            [
                'name' => 'Футболки',
                'parent_id' => 3
            ]
        );

        \App\Category::create(
            [
                'name' => 'Майки',
                'parent_id' => 3
            ]
        );

        \App\Category::create(
            [
                'name' => 'Толстовки и куртки',
                'parent_id' => 3
            ]
        );

        \App\Category::create(
            [
                'name' => 'Легенсы, шорты,платья и юбки',
                'parent_id' => 3
            ]
        );

        \App\Category::create(
            [
                'name' => 'Для беременых',
                'parent_id' => 3
            ]
        );

        \App\Category::create(
            [
                'name' => 'Аксессуары',
                'parent_id' => 3
            ]
        );

        //то ЧТО входит в категорию 'для Детей'
        \App\Category::create(
            [
                'name' => 'Футболки',
                'parent_id' => 4
            ]
        );

        \App\Category::create(
            [
                'name' => 'Толстовки',
                'parent_id' => 4
            ]
        );

        \App\Category::create(
            [
                'name' => 'Брюки',
                'parent_id' => 4
            ]
        );

        \App\Category::create(
            [
                'name' => 'Аксессуары',
                'parent_id' => 4
            ]
        );

        \App\Category::create(
            [
                'name' => 'Головные уборы',
                'parent_id' => 4
            ]
        );
        // все что входит в категорию Акссесуары
        \App\Category::create(
            [
                'name' => 'Посуда',
                'parent_id' => 5
            ]
        );

        \App\Category::create(
            [
                'name' => 'Автонаклейки',
                'parent_id' => 5
            ]
        );

        \App\Category::create(
            [
                'name' => 'Значки и брелоки',
                'parent_id' => 5
            ]
        );

        \App\Category::create(
            [
                'name' => 'Ковреки для мышки и обложки для документов',
                'parent_id' => 5
            ]
        );

        \App\Category::create(
            [
                'name' => 'Сувениры',
                'parent_id' => 5
            ]
        );
        // все что входит в категорию Чехлы
        \App\Category::create(
            [
                'name' => 'Apple IPhone 4/4s',
                'parent_id' => 6
            ]
        );

        \App\Category::create(
            [
                'name' => 'Apple IPhone 5/5s',
                'parent_id' => 6
            ]
        );

        \App\Category::create(
            [
                'name' => 'Apple IPhone 6/6s',
                'parent_id' => 6
            ]
        );

        \App\Category::create(
            [
                'name' => 'Apple IPhone 6 Plus',
                'parent_id' => 6
            ]
        );

        \App\Category::create(
            [
                'name' => 'Samsung Galaxy',
                'parent_id' => 6
            ]
        );
    }
}
