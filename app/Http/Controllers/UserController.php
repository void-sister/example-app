<?php

namespace App\Http\Controllers;

use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
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
            'email' => 'required|unique:users,email',
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
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $userService = new UserService();
        $user = $userService->getUserById($user->id);

        $roleService = new RoleService();
        $roles = $roleService->getRolesList();

        return view('users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|unique:users,email',
            'password' => ['sometimes', Password::min(8)],
        ]);

        $service = new UserService();
        $updatedId = $service->updateUser($request->only('name', 'email', 'password', 'role_id'), $id);

        if(!$updatedId) {
            return redirect()->back()->with('error', 'User not updated');
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Soft delete the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        if (!$request->user()->can('delete-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new UserService();
        $deletedId = $service->softDeleteUser($user->id);

        if(!$deletedId) {
            return redirect()->back()->with('error', 'User not soft deleted');
        }

        return redirect()->route('users.index')
            ->with('success', 'User soft deleted successfully');

    }

    /**
     * Restore the specified soft deleted resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function restore(Request $request, User $user): RedirectResponse
    {
        if (!$request->user()->can('edit-users')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new UserService();
        $restoredId = $service->restoreUser($user->id);

        if(!$restoredId) {
            return redirect()->back()->with('error', 'User not restored');
        }

        return redirect()->route('users.index')
            ->with('success', 'User restored successfully');
    }
}
