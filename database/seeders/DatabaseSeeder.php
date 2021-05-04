<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Storage::deleteDirectory('posts');
    Storage::makeDirectory('posts');
    
    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
    ]);
    Category::factory(4)->create();
    Tag::factory(8)->create();
    $this->call(PostSeeder::class);
  }
}
