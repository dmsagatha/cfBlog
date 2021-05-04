<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
  /**
   * Cada vez que se cree un Post, se le asigne el id del
   * Usuario autenticado
   */
  public function creating(Post $post)
  {
    // Se ejecute si no se esta ingresando registros desde la consola
    if (! \App::runningInConsole()) {
      $post->user_id = auth()->user()->id;
    }
  }

  /**
   * Este evento se ejecuta antes de que se elimine el Post
   */
  public function deleting(Post $post)
  {
    if ($post->image) {
      Storage::delete([$post->image->url]);
    }
  }
}