<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAssociatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::table('products')->take(2)->get();

        $colors = DB::table('colors')->get();

        foreach($colors as $color) {
            foreach($products as $product) {
                DB::table('products_associated')->insert([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                ]);
            }
        }
    }
}
