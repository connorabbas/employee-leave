<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:permissions,name']
        ]);

        $permission = Permission::create(['name' => $validatedData['name']]);

        return redirect()->back()->with('message', 'Permission created successfully.');
    }
}
