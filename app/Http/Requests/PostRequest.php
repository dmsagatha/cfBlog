<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
  public function authorize()
  {
    // Autorizar si el Usuario autenticado coincide
    /* if ($this->user_id == auth()->user()->id)
    {
      return true;
    } else {
      return false;
    } */

    return true;
  }

  public function rules()
  {
    // Obtener los datos del Post (Editar)
    $post = $this->route()->parameter('post'); // Aquí esta en null

    // Reglas para Crear y si el Estatus es borrador (1)
    $rules = [
      'name'   => 'required',
      'slug'   => 'required|unique:posts',
      'status' => 'required|in:1,2',
      'url'    => 'image|mimes:jpeg,png,jpg,gif|min:1|max:1000'
    ];

    // Reglas para Editar - Si existe un valor almacenado en $post
    if ($post) {
      $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
    }    

    if ($this->status == 2)
    {
      $rules = array_merge($rules, [
        'category_id' => 'required',
        'tags'        => 'required',
        'extract'     => 'required',
        'body'        => 'required',
      ]);
    }

    return $rules;
  }
}