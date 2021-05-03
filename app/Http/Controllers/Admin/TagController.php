<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  public function index()
  {
    $tags = Tag::all();

    return view('admin.tags.index', compact('tags'));
  }

  public function create()
  {
    $colors = [
      'red'    => 'Color Rojo',
      'yellow' => 'Color amarillo',
      'green'  => 'Color verde',
      'blue'   => 'Color azul',
      'indigo' => 'Color indigo',
      'purple' => 'Color morado',
      'pink'   => 'Color rosado',
    ];

    return view('admin.tags.create', compact('colors'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'name'  => 'required',
      'slug'  => 'required|unique:tags',
      'color' => 'required',
    ]);

    $tag = Tag::create($request->all());

    return redirect()->route('admin.tags.index', $tag)->with('info', 'Etiqueta creada con éxito');
  }

  public function show(Tag $tag)
  {
    return view('admin.tags.show', compact('tag'));
  }

  public function edit(Tag $tag)
  {
$colors = [
  'red'    => 'Color Rojo',
  'yellow' => 'Color amarillo',
  'green'  => 'Color verde',
  'blue'   => 'Color azul',
  'indigo' => 'Color indigo',
  'purple' => 'Color morado',
  'pink'   => 'Color rosado',
];

    return view('admin.tags.edit', compact('tag', 'colors'));
  }

  public function update(Request $request, Tag $tag)
  {
    $request->validate([
      'name' => 'required',
      'slug' => "required|unique:tags,slug,$tag->id",
    ]);

    $tag->update($request->all());

    return redirect()->route('admin.tags.index', $tag)->with('info', 'Etiqueta actualizada con éxito');
  }

  public function destroy(Tag $tag)
  {
    $tag->delete();

    return redirect()->route('admin.tags.index')->with('danger', 'Etiqueta eliminada con éxito');
  }
}