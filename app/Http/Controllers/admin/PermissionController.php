<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PermissionService;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of permissions.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('permissions.index', compact(['permissions', 'roles']));
    }

    /**
     * Store a newly created permission in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$request->user()->can('create-permissions')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:permissions|max:255',
        ]);

        $service = new PermissionService();
        $created = $service->createPermission($request->except('_token'));

        if(!$created) {
            return redirect()->back()->with('error', 'Permission not created');
        }

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }
}
