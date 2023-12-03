<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/RolePermission');
    }

    public function store(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'distinct', 'exists:permissions,id'],
        ]);

        $role->syncPermissions($validatedData['permissions']);

        return redirect()->back()->with('message', 'Permissions assigned successfully.');
    }
}
