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

    public function getTrashedUsers() {
        return User::onlyTrashed()->get();
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

    public function updateUser($params, User $user): bool
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

        return $updatedUser;
    }

    public function softDeleteUser(User $user): ?bool
    {
        //TODO delete role ?
        return $user->delete();
    }

    public function restoreUser($id): ?bool
    {
        return User::withTrashed()->find($id)->restore();
    }

    public function forceDeleteUser($id): ?bool
    {
        return User::withTrashed()->find($id)->forceDelete();
    }
}
