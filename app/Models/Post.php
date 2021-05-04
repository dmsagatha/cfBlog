<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  /**
   * Campos que no se pueden actualizar a través del formulario
   */
  protected $guarded = ['id', 'created_at', 'updated_at'];
  
  /**
   * Relación uno a muchos inversa
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * Relación muchos a muchos
   */
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  /**
   * Relación de uno a uno polimórfica
   */
  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }
}