<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Customer',
            'slug' => 'customer',
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager',
            'slug' => 'manager',
        ]);
        DB::table('roles')->insert([
            'name' => 'Supplier',
            'slug' => 'supplier',
        ]);
        DB::table('roles')->insert([
            'name' => 'Creator',
            'slug' => 'creator',
        ]);

        $admin = User::where('name', 'admin')->first();
        $admin_role = Role::where('slug', 'admin')->first();
        $admin->roles()->attach($admin_role);

        $manager = User::where('name', 'manager')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $manager->roles()->attach($manager_role);

        $supplier = User::where('name', 'supplier')->first();
        $supplier_role = Role::where('slug', 'supplier')->first();
        $supplier->roles()->attach($supplier_role);

        $creator = User::where('name', 'creator')->first();
        $creator_role = Role::where('slug', 'creator')->first();
        $creator->roles()->attach($creator_role);
    }
}
