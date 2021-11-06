<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('administrator123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'supplier',
            'email' => 'supplier@gmail.com',
            'password' => Hash::make('supplier123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'creator',
            'email' => 'creator@gmail.com',
            'password' => Hash::make('creator123456'),
        ]);
    }
}
