<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $validated['name']]);

        if (isset($validated['permissions'])) {
            $role->syncPermissions($validated['permissions']);
        }

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'array', // Valida que sea un array si está presente
        ]);

        // Actualiza el nombre del rol
        $role->update(['name' => $validated['name']]);

        // Si no hay permisos enviados, asegúrate de desvincular todos los permisos existentes
        $permissions = $validated['permissions'] ?? [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
