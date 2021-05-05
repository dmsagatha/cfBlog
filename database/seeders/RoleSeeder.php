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

    Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

    Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categores.index'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.categores.create'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.categores.edit'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.categores.destroy'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1]);
    Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
    Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);
  }
}