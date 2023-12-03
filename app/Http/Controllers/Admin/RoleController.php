<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:roles,name'],
        ]);

        $role = Role::create(['name' => $validatedData['name']]);

        return redirect()->back()->with('message', 'Role created successfully.');
    }
}
