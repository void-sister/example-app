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
        DB::table('products_categories')->insert([
            'slug' => 'plants',
            'name' => 'Plants',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'pots',
            'name' => 'Pots',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'soil',
            'name' => 'Soil',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'fertilizers',
            'name' => 'Fertilizers',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'accessories',
            'name' => 'Accessories',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'tech',
            'name' => 'Tech',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'kits',
            'name' => 'Kits & florariums',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'books',
            'name' => 'Books',
        ]);
        DB::table('products_categories')->insert([
            'slug' => 'furniture',
            'name' => 'Furniture',
        ]);
    }
}
