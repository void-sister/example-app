<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'user_id' => 5,
            'region_id' => 1,
            'email' => 'ksjdlkfjsdf@gmail.com',
            'f_name' => 'first name',
            'l_name' => 'last name',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);
        DB::table('customers')->insert([
            'user_id' => 6,
            'region_id' => 1,
            'email' => 'ioewiru@gmail.com',
            'f_name' => 'first name1',
            'l_name' => 'last name1',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);
        DB::table('customers')->insert([
            'user_id' => 7,
            'region_id' => 1,
            'email' => 'ksjdlkfjsdf1@gmail.com',
            'f_name' => 'first name2',
            'l_name' => 'last name2',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);
        DB::table('customers')->insert([
            'user_id' => 8,
            'region_id' => 1,
            'email' => 'ksjdlkfjsd8f@gmail.com',
            'f_name' => 'first name8',
            'l_name' => 'last name8',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);
        DB::table('customers')->insert([
            'user_id' => 9,
            'region_id' => 1,
            'email' => 'ksjdlkfjsd9f@gmail.com',
            'f_name' => 'first name9',
            'l_name' => 'last name9',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);
        DB::table('customers')->insert([
            'user_id' => 10,
            'region_id' => 1,
            'email' => 'ksjdlkfjs10df@gmail.com',
            'f_name' => 'first name10',
            'l_name' => 'last name10',
            'age' => 25,
            'inst' => 'inst',
            'fb' => null,
            'desired_delivery' => Customer::DELIVERY_NP,
            'last_np_office' => null,
            'zip' => null,
            'city' => 'kiev',
        ]);

    }
}
