<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier_products')->insert([
            'supplier_id' => 1,
            'product_id' => 3,
        ]);

        DB::table('supplier_products')->insert([
            'supplier_id' => 1,
            'product_id' => 4,
        ]);

        DB::table('supplier_products')->insert([
            'supplier_id' => 1,
            'product_id' => 5,
        ]);

        DB::table('supplier_products')->insert([
            'supplier_id' => 2,
            'product_id' => 4,
        ]);

        DB::table('supplier_products')->insert([
            'supplier_id' => 2,
            'product_id' => 5,
        ]);

        DB::table('supplier_products')->insert([
            'supplier_id' => 3,
            'product_id' => 6,
        ]);
    }
}
