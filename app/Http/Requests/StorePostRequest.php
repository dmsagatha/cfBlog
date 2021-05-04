<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
  public function authorize()
  {
    // Autorizar si el Usuario autenticado coincide
    if ($this->user_id == auth()->user()->id) {
      return true;
    } else
    return false;
  }

  public function rules()
  {
    // Reglas si el Estatus es borrador (1)
    $rules = [
      'name' => 'required',
      'slug' => 'required|unique:posts',
      'status' => 'required|in:1,2'
    ];
    
    if ($this->status == 2) {
      $rules = array_merge($rules, [
        'category_id' => 'required',
        'tags' => 'required',
        'extract' => 'required',
        'body' => 'required'
      ]);
    }

    return $rules;
  }
}