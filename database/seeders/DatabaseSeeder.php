<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserPermissionSeeder::class,

            CustomerSeeder::class,

            ProductCategorySeeder::class,
            PlantSeeder::class,
            PotSeeder::class,
            SupplierSeeder::class,
        ]);
    }
}
