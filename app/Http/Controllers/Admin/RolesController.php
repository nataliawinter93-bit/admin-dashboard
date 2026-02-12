<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RolesController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('create', Role::class);

        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:roles,slug',
        ]);

        Role::create($request->only('name', 'slug'));

        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль создана');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:roles,slug,' . $role->id,
        ]);

        $role->update($request->only('name', 'slug'));

        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль обновлена');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if ($role->slug === 'admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Нельзя удалить роль администратора');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль удалена');
    }
}
