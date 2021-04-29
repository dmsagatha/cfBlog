<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  public function run()
  {
    $posts = Post::factory(100)->create();

    foreach ($posts as $post) {
      Image::factory(1)->create([
        'imageable_id' => $post->id,
        'imageable_type' => Post::class
      ]);
      $post->tags()->attach([
        // Agredar 2 etiquetas al Post
        // Elegir un número entre el 1 y el 4
        // Elegir un número entre el 5 y el 8
        rand(1, 4),
        rand(5, 8)
      ]);
    }
  }
}