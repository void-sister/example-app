<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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

        return view('permissions.index', compact(['permissions']));
    }
}
