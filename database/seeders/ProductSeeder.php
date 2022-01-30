<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plants = DB::table('plants')
            ->whereIn('id', [1, 2, 5])
            ->get();

        $pots = DB::table('pots')
            ->whereIn('id', [1, 2, 3])
            ->get();

        foreach ($plants as $plant) {
            DB::table('products')->insert([
                'product_category_id' => $plant->product_category_id,
                'entity_id' => $plant->id,
            ]);
        }

        foreach ($pots as $pot) {
            DB::table('products')->insert([
                'product_category_id' => $pot->product_category_id,
                'entity_id' => $pot->id,
            ]);
        }
    }
}
