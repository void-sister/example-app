<?php

namespace Database\Seeders;

use App\Models\Pot;
use Illuminate\Database\Seeder;

class PotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pot::factory()->count(5)->create();
    }
}
