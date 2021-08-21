<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function getUsersList() {
        return User::all();
    }

    public function getUserById($id) {
        return User::where('id', $id)->first();
    }

    public function createUser($params)
    {
        //TODO if no params (nullable)
        $params['password'] = Hash::make($params['password']);

        return User::create($params);
    }

    public function updateUser($params, $id) {
        $params['password'] = Hash::make($params['password']);

        return User::where('id', $id)->update($params);
    }

    public function softDeleteUser($id) {
        return User::where('id', $id)->delete();
    }

    public function restoreUser($id) {
        return User::where('id', $id)->restore();
    }
}
