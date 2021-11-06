<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants_categories')->insert([
            'slug' => 'blooming',
            'name' => 'Blooming',
            'description_ru' => 'blooming ru',
            'description_uk' => 'blooming uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'ornamental',
            'name' => 'Ornamental',
            'description_ru' => 'ornamental ru',
            'description_uk' => 'ornamental uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'exclusive',
            'name' => 'Exclusive',
            'description_ru' => 'exclusive ru',
            'description_uk' => 'exclusive uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'bonsai',
            'name' => 'Bonsai',
            'description_ru' => 'bonsai ru',
            'description_uk' => 'bonsai uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'orchids',
            'name' => 'Orchids',
            'description_ru' => 'orchids ru',
            'description_uk' => 'orchids uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'succulents',
            'name' => 'Succulents',
            'description_ru' => 'succulents ru',
            'description_uk' => 'succulents uk',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'cacti',
            'name' => 'Cacti',
            'description_ru' => 'cacti ru',
            'description_uk' => 'cacti uk',
        ]);
    }
}
