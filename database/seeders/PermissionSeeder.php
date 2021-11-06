<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Permissions
        DB::table('permissions')->insert([
            'name' => 'Create permissions',
            'slug' => 'create-permissions',
        ]);

//        Users
        DB::table('permissions')->insert([
            'name' => 'View users',
            'slug' => 'view-users',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Create users',
            'slug' => 'create-users',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit users',
            'slug' => 'edit-users',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete users',
            'slug' => 'delete-users',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Restore users',
            'slug' => 'restore-users',
        ]);

//        Plants
        DB::table('permissions')->insert([
            'name' => 'Create plants',
            'slug' => 'create-plants',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit plants',
            'slug' => 'edit-plants',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Archive plants',
            'slug' => 'archive-plants',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Return plants',
            'slug' => 'return-plants',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete plants',
            'slug' => 'delete-plants',
        ]);
    }
}
