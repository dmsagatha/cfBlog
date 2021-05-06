<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  public function __construct()
  {
    $this->middleware('can:admin.roles.index')->only('index');
    $this->middleware('can:admin.roles.create')->only('create', 'store');
    $this->middleware('can:admin.roles.edit')->only('edit', 'update');
    $this->middleware('can:admin.roles.destroy')->only('destroy');
  }

  public function index()
  {
    $roles = Role::all();

    return view('admin.roles.index', compact('roles'));
  }

  public function create()
  {
    $permissions = Permission::all();

    return view('admin.roles.create', compact('permissions'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
    ]);

    $role = Role::create($request->all());

    // Asignar los permisos al Rol creado
    $role->permissions()->sync($request->permissions);

    return redirect()->route('admin.roles.index', $role)->with('info', 'Rol creado con éxito');
  }

  public function show(Role $role)
  {
    return view('admin.roles.show', compact('role'));
  }

  public function edit(Role $role)
  {
    $permissions = Permission::all();

    return view('admin.roles.edit', compact('role', 'permissions'));
  }

  public function update(Request $request, Role $role)
  {
    $request->validate([
      'name' => 'required',
    ]);

    $role->update($request->all());

    // Asignar los permisos al Rol creado
    $role->permissions()->sync($request->permissions);

    return redirect()->route('admin.roles.index', $role)->with('info', 'Rol actualizado con éxito');
  }

  public function destroy(Role $role)
  {
    $role->delete();

    return redirect()->route('admin.roles.index')->with('danger', 'Rol eliminado con éxito');
  }
}