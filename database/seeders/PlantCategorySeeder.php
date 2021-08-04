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
            'slug' => 'house',
            'name_ru' => 'Комнатные',
            'name_uk' => 'Кімнатні',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'exclusive',
            'name_ru' => 'Экслюзив',
            'name_uk' => 'Ексклюзив',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'garden',
            'name_ru' => 'Садовые',
            'name_uk' => 'Садові',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'bonsai',
            'name_ru' => 'Бонсаи',
            'name_uk' => 'Бонсаї',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'orchids',
            'name_ru' => 'Орхидеи',
            'name_uk' => 'Орхідеї',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'office',
            'name_ru' => 'Офисные',
            'name_uk' => 'Офісні',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'succulents',
            'name_ru' => 'Суккуленты',
            'name_uk' => 'Суккуленти',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
        DB::table('plants_categories')->insert([
            'slug' => 'cacti',
            'name_ru' => 'Кактусы',
            'name_uk' => 'Кактуси',
            'description_ru' => 'rus',
            'description_uk' => 'ukr',
        ]);
    }
}
