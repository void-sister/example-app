<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'slug' => 'house',
            'name_ru' => 'Комнатные',
            'name_uk' => 'Кімнатні',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'exclusive',
            'name_ru' => 'Экслюзив',
            'name_uk' => 'Ексклюзив',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'garden',
            'name_ru' => 'Садовые',
            'name_uk' => 'Садові',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'bonsai',
            'name_ru' => 'Бонсаи',
            'name_uk' => 'Бонсаї',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'orchids',
            'name_ru' => 'Орхидеи',
            'name_uk' => 'Орхідеї',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'office',
            'name_ru' => 'Офисные',
            'name_uk' => 'Офісні',
            'description' => '',
        ]);
        DB::table('categories')->insert([
            'slug' => 'accessories',
            'name_ru' => 'Аксессуары',
            'name_uk' => 'Аксесуари',
            'description' => '',
        ]);
    }
}
