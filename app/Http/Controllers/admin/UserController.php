<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of users.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $userService = new UserService();
        $users = $userService->getUsersList();

        $roleService = new RoleService();
        $roles = $roleService->getRolesList();

        return view('users.index', compact(['users', 'roles']));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $service = new RoleService();
        $roles = $service->getRolesList();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$request->user()->can('create-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
            'password' => ['required', Password::min(8)],
            'role' => 'required|numeric'
        ]);

        $service = new UserService();
        $createdId = $service->createUser($request->except('_token'));

        if(!$createdId) {
            return redirect()->back()->with('error', 'User not created');
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $roleService = new RoleService();
        $roles = $roleService->getRolesList();

        return view('users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        if (!$request->user()->can('edit-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
            'password' => ['required', Password::min(8)], //TODO password not required
            'role' => 'required|numeric'
        ]);

        $service = new UserService();
        $updatedUser = $service->updateUser($request->except('_method', '_token'), $user);

        if(!$updatedUser) {
            return redirect()->back()->with('error', 'User not updated');
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Soft delete the specified user in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function softDelete(Request $request, User $user): RedirectResponse
    {
        if (!$request->user()->can('delete-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new UserService();
        $deletedUser = $service->softDeleteUser($user);

        if(!$deletedUser) {
            return redirect()->back()->with('error', 'User not trashed');
        }

        return redirect()->route('users.index')
            ->with('success', 'User trashed successfully');

    }

    /**
     * Display a listing of trashed users.
     *
     * @return Application|Factory|View
     */
    public function trashed()
    {
        $userService = new UserService();
        $users = $userService->getTrashedUsers();

        $roleService = new RoleService();
        $roles = $roleService->getRolesList();

        return view('users.trashed', compact(['users', 'roles']));
    }

    /**
     * Restore the specified trashed user in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function restore(Request $request, $id): RedirectResponse
    {
        if (!$request->user()->can('restore-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new UserService();
        $restoredUser = $service->restoreUser($id);

        if(!$restoredUser) {
            return redirect()->back()->with('error', 'User not restored');
        }

        return redirect()->route('users.index')
            ->with('success', 'User restored successfully');
    }

    /**
     * Force delete the specified user in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        if (!$request->user()->can('delete-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new UserService();
        $deletedUser = $service->forceDeleteUser($id);

        if(!$deletedUser) {
            return redirect()->back()->with('error', 'User not destroyed');
        }

        return redirect()->route('users.trashed')
            ->with('success', 'User destroyed successfully');

    }
}
