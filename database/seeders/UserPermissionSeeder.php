<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionSeeder extends Seeder
{
    const ADMIN_ROLE = 1;
    const CUSTOMER_ROLE = 2;
    const MANAGER_ROLE = 3;
    const SUPPLIER_ROLE = 4;
    const CREATOR_ROLE = 5;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = User::where('name', 'admin')->first();
        $admin_permissions = DB::table('roles_permissions')
            ->where('role_id', self::ADMIN_ROLE)
            ->get();

        foreach($admin_permissions as $permission) {
            $admin_user->permissions()->attach($permission->permission_id);
        }
    }
}
