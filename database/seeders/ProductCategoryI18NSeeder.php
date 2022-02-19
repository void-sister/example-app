<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryI18NSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Plants categories translations
         */
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 1,
            'language' => 'ru',
            'name' => 'Растения',
            'description' => 'plants ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 1,
            'language' => 'uk',
            'name' => 'Растения',
            'description' => 'plants uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 2,
            'language' => 'ru',
            'name' => 'Цветущие',
            'description' => 'blooming ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 2,
            'language' => 'uk',
            'name' => 'Декоративні',
            'description' => 'blooming uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 3,
            'language' => 'ru',
            'name' => 'Декоративные',
            'description' => 'ornamental ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 3,
            'language' => 'uk',
            'name' => 'Декоративні',
            'description' => 'ornamental uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 4,
            'language' => 'ru',
            'name' => 'Экслюзив',
            'description' => 'exclusive ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 4,
            'language' => 'uk',
            'name' => 'Ексклюзив',
            'description' => 'exclusive uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 5,
            'language' => 'ru',
            'name' => 'Бонсаи',
            'description' => 'bonsai ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 5,
            'language' => 'uk',
            'name' => 'Бонсаї',
            'description' => 'bonsai uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 6,
            'language' => 'ru',
            'name' => 'Орхидеи',
            'description' => 'orchids ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 6,
            'language' => 'uk',
            'name' => 'Орхідеї',
            'description' => 'orchids uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 7,
            'language' => 'ru',
            'name' => 'Суккуленты',
            'description' => 'succulents ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 7,
            'language' => 'uk',
            'name' => 'Суккуленти',
            'description' => 'succulents uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 8,
            'language' => 'ru',
            'name' => 'Кактусы',
            'description' => 'cacti ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 8,
            'language' => 'uk',
            'name' => 'Кактуси',
            'description' => 'cacti uk',
        ]);

        /**
         * Pots categories translations
         */
        /*
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 9,
            'language' => 'ru',
            'description' => 'pots ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 9,
            'language' => 'uk',
            'description' => 'pots uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 10,
            'language' => 'ru',
            'description' => 'indoor-plant-pots ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 10,
            'language' => 'uk',
            'description' => 'indoor-plant-pots uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 11,
            'language' => 'ru',
            'description' => 'outdoor-plant-pots ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 11,
            'language' => 'uk',
            'description' => 'outdoor-plant-pots uk',
        ]);

        DB::table('product_category_i18n')->insert([
            'product_category_id' => 12,
            'language' => 'ru',
            'description' => 'self-watering-plant-pots ru',
        ]);
        DB::table('product_category_i18n')->insert([
            'product_category_id' => 12,
            'language' => 'uk',
            'description' => 'self-watering-plant-pots uk',
        ]);
        */
    }
}
