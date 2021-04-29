<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
  protected $model = Image::class;
  
  public function definition()
  {
    return [
      // 'url' => $this->faker->image('public/strorage/posts', 640, 480, null, true), // true => public/strorage/posts/imagen.jpg - false => imagen.jpg
      'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false),  // posts/imagen.jpg
    ];
  }
}