<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Plants category & subcategories
         */
        $plantsId = DB::table('product_categories')->insertGetId([
            'slug' => 'plants',
            'name' => 'Plants',
            'description_ru' => 'plants ru',
            'description_uk' => 'plants uk',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'blooming',
            'name' => 'Blooming',
            'description_ru' => 'blooming ru',
            'description_uk' => 'blooming uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'ornamental',
            'name' => 'Ornamental',
            'description_ru' => 'ornamental ru',
            'description_uk' => 'ornamental uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'exclusive',
            'name' => 'Exclusive',
            'description_ru' => 'exclusive ru',
            'description_uk' => 'exclusive uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'bonsai',
            'name' => 'Bonsai',
            'description_ru' => 'bonsai ru',
            'description_uk' => 'bonsai uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'orchids',
            'name' => 'Orchids',
            'description_ru' => 'orchids ru',
            'description_uk' => 'orchids uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'succulents',
            'name' => 'Succulents',
            'description_ru' => 'succulents ru',
            'description_uk' => 'succulents uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'cacti',
            'name' => 'Cacti',
            'description_ru' => 'cacti ru',
            'description_uk' => 'cacti uk',
        ]);

        /**
         * Pots category & subcategories
         */
        $potsId = DB::table('product_categories')->insertGetId([
            'slug' => 'pots',
            'name' => 'Pots',
            'description_ru' => 'pots ru',
            'description_uk' => 'pots uk',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'indoor-plant-pots',
            'name' => 'Indoor plant pots',
            'description_ru' => ' ru',
            'description_uk' => ' uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'outdoor-plant-pots',
            'name' => 'Outdoor plant pots',
            'description_ru' => ' ru',
            'description_uk' => ' uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'self-watering-plant-pots',
            'name' => 'Self watering plant pots',
            'description_ru' => ' ru',
            'description_uk' => ' uk',
        ]);

        /**
         * Soil category
         */
        DB::table('product_categories')->insert([
            'slug' => 'soil',
            'name' => 'Soil',
            'description_ru' => 'soil ru',
            'description_uk' => 'soil uk',
        ]);

        /**
         * Fertilizers category
         */
        DB::table('product_categories')->insert([
            'slug' => 'fertilizers',
            'name' => 'Fertilizers',
            'description_ru' => 'fertilizers ru',
            'description_uk' => 'fertilizers uk',
        ]);

        /**
         * Fertilizers category
         */
        DB::table('product_categories')->insert([
            'slug' => 'accessories',
            'name' => 'Accessories',
            'description_ru' => 'accessories ru',
            'description_uk' => 'accessories uk',
        ]);

        /**
         * Tech category & subcategories
         */
        $techId = DB::table('product_categories')->insertGetId([
            'slug' => 'tech',
            'name' => 'Tech',
            'description_ru' => 'tech ru',
            'description_uk' => 'tech uk',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $techId,
            'slug' => 'lamps',
            'name' => 'Lamps',
            'description_ru' => 'lamps ru',
            'description_uk' => 'lamps uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $techId,
            'slug' => 'humidifiers',
            'name' => 'Humidifiers',
            'description_ru' => 'humidifiers ru',
            'description_uk' => 'humidifiers uk',
        ]);

        /**
         * Kits&florariums category & subcategories
         */
        $kitsId = DB::table('product_categories')->insertGetId([
            'slug' => 'kits-and-florariums',
            'name' => 'Kits&florariums',
            'description_ru' => 'kits and florariums ru',
            'description_uk' => 'kits and florariums uk',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $kitsId,
            'slug' => 'kits',
            'name' => 'Kits',
            'description_ru' => 'kits ru',
            'description_uk' => 'kits uk',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $kitsId,
            'slug' => 'florariums',
            'name' => 'Florariums',
            'description_ru' => 'florariums ru',
            'description_uk' => 'florariums uk',
        ]);

        /**
         * Books category
         */
        DB::table('product_categories')->insert([
            'slug' => 'books',
            'name' => 'Books',
            'description_ru' => 'books ru',
            'description_uk' => 'books uk',
        ]);

        /**
         * Furniture category
         */
        DB::table('product_categories')->insert([
            'slug' => 'furniture',
            'name' => 'Furniture',
            'description_ru' => 'furniture ru',
            'description_uk' => 'furniture uk',
        ]);
    }
}
