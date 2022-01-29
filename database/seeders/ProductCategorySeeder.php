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
    }
}
