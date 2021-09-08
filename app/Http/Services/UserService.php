<?php

namespace App\Http\Services;

use App\Models\Role;
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

    public function createUser($params): User
    {
        $role = Role::where('id', $params['role'])->first();

        $user = new User();
        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);
        $user->save();
        $user->roles()->attach($role);

        return $user;
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
