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
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'blooming',
            'name' => 'Blooming',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'ornamental',
            'name' => 'Ornamental',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'exclusive',
            'name' => 'Exclusive',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'bonsai',
            'name' => 'Bonsai',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'orchids',
            'name' => 'Orchids',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'succulents',
            'name' => 'Succulents',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $plantsId,
            'slug' => 'cacti',
            'name' => 'Cacti',
        ]);

        /**
         * Pots category & subcategories
         */
        $potsId = DB::table('product_categories')->insertGetId([
            'slug' => 'pots',
            'name' => 'Pots',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'indoor-plant-pots',
            'name' => 'Indoor plant pots',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'outdoor-plant-pots',
            'name' => 'Outdoor plant pots',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $potsId,
            'slug' => 'self-watering-plant-pots',
            'name' => 'Self watering plant pots',
        ]);

        /**
         * Soil category
         */
        DB::table('product_categories')->insert([
            'slug' => 'soil',
            'name' => 'Soil',
        ]);

        /**
         * Fertilizers category
         */
        DB::table('product_categories')->insert([
            'slug' => 'fertilizers',
            'name' => 'Fertilizers',
        ]);

        /**
         * Fertilizers category
         */
        DB::table('product_categories')->insert([
            'slug' => 'accessories',
            'name' => 'Accessories',
        ]);

        /**
         * Tech category & subcategories
         */
        $techId = DB::table('product_categories')->insertGetId([
            'slug' => 'tech',
            'name' => 'Tech',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $techId,
            'slug' => 'lamps',
            'name' => 'Lamps',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $techId,
            'slug' => 'humidifiers',
            'name' => 'Humidifiers',
        ]);

        /**
         * Kits&florariums category & subcategories
         */
        $kitsId = DB::table('product_categories')->insertGetId([
            'slug' => 'kits-and-florariums',
            'name' => 'Kits&florariums',
        ]);

        DB::table('product_categories')->insert([
            'parent_id' => $kitsId,
            'slug' => 'kits',
            'name' => 'Kits',
        ]);
        DB::table('product_categories')->insert([
            'parent_id' => $kitsId,
            'slug' => 'florariums',
            'name' => 'Florariums',
        ]);

        /**
         * Books category
         */
        DB::table('product_categories')->insert([
            'slug' => 'books',
            'name' => 'Books',
        ]);

        /**
         * Furniture category
         */
        DB::table('product_categories')->insert([
            'slug' => 'furniture',
            'name' => 'Furniture',
        ]);
    }
}
