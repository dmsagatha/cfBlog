<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();

    return view('admin.posts.index', compact('posts'));
  }

  public function create()
  {
    $categories = Category::pluck('name', 'id');
    $tags = Tag::all();

    return view('admin.posts.create', compact('categories', 'tags'));
  }

  public function store(StorePostRequest $request)
  {
    $post = Post::create($request->all());

    if ($request->tags) {
      $post->tags()->attach($request->tags);
    }
    
    return redirect()->route('admin.posts.index', $post)->with('info', 'Post creado con éxito');
  }

  public function show(Post $post)
  {
  }

  public function edit(Post $post)
  {
  }

  public function update(Request $request, Post $post)
  {
  }

  public function destroy(Post $post)
  {
  }
}