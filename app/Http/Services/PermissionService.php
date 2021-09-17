<?php

namespace App\Http\Services;

use App\Models\Permission;

class PermissionService extends BaseService
{
    public function createPermission($params)
    {
        return Permission::create($params);
    }
}
