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

    public function updateUser($params, User $user): User
    {
        $updatedUser = $user->update([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);

        if(!$updatedUser) {
            //TODO early return
        }

        $role = Role::where('id', $params['role'])->first();

        if(!$user->hasRole($role->slug)) {
            $user->roles()->detach();
            $user->roles()->attach($role);
        }

        return $user;
    }

    public function softDeleteUser(User $user): ?bool
    {
        return $user->delete();
    }

    public function restoreUser(User $user): ?bool
    {
        return $user->restore();
    }
}
