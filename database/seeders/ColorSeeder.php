<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'pink', 'white', 'black'
        ];

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color,
            ]);
        }
    }
}
