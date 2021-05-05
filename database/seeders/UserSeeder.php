<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    User::create([
      'name' => 'Super Admin',
      'email' => 'superadmin@admin.net',
      'password' => bcrypt('superadmin')
    ])->assignRole('Admin');
    
    User::factory(29)->create();
  }
}