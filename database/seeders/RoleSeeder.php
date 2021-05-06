<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run()
  {
    $role1 = Role::create(['name' => 'Admin']);
    $role2 = Role::create(['name' => 'Blogger']);

    Permission::create(['name' => 'admin.home',
                        'description' => 'Ver el Dashboard'])->syncRoles([$role1, $role2]);

    Permission::create(['name' => 'admin.users.index',
                        'description' => 'Ver listado de Usuarios'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.users.edit',
                        'description' => 'Asignar un Rol'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.users.update',
                        'description' => 'Actualizar asignación de Rol'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.roles.index',
                        'description' => 'Ver listado de Roles'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.roles.create',
                        'description' => 'Crear Rol'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.roles.edit',
                        'description' => 'Editar Rol'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.roles.update',
                        'description' => 'Actualizar Rol'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.roles.destroy',
                        'description' => 'Eliminar Rol'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categories.index',
                        'description' => 'Ver listado de Categorías'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.categories.create',
                        'description' => 'Crear Categoría'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.categories.edit',
                        'description' => 'Editar Categoría'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.categories.destroy',
                        'description' => 'Eliminar Categoría'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.index',
                        'description' => 'Ver listado de Etiquetas'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.tags.create',
                        'description' => 'Crear Etiqueta'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.tags.edit',
                        'description' => 'Editar Etiqueta'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.tags.destroy',
                        'description' => 'Eliminar Etiqueta'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.index',
                        'description' => 'Ver listado de Posts'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.create',
                        'description' => 'Crear Post'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.edit',
                        'description' => 'Editar Post'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.destroy',
                        'description' => 'Eliminar Post'])->syncRoles([$role1, $role2]);
  }
}