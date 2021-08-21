<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $service = new UserService();
        $users = $service->getUsersList();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => ['required', Password::min(8)],
            'role_id' => 'integer'
        ]);

        $service = new UserService();
        $created = $service->createUser($request->only('name', 'email', 'password', 'role_id'));

        if(!$created) {
            return redirect()->back()->with('error', 'User not created');
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $service = new UserService();
        $user = $service->getUserById($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $service = new UserService();
        $user = $service->getUserById($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => ['required', Password::min(8)],
            'role_id' => 'integer'
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
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $service = new UserService();
        $deletedId = $service->softDeleteUser($id);

        if(!$deletedId) {
            return redirect()->back()->with('error', 'User not soft deleted');
        }

        return redirect()->route('users.index')
            ->with('success', 'User soft deleted successfully');

    }

    /**
     * Restore the specified soft deleted resource in storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function restore(int $id): RedirectResponse
    {
        $service = new UserService();
        $restoredId = $service->restoreUser($id);

        if(!$restoredId) {
            return redirect()->back()->with('error', 'User not restored');
        }

        return redirect()->route('users.index')
            ->with('success', 'User restored successfully');
    }
}
