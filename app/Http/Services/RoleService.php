<?php

namespace App\Http\Services;

use App\Models\Role;

class RoleService extends BaseService
{
    public function getRolesList() {
        return Role::all();
    }
}
