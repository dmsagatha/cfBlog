<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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

  public function store(Request $request)
  {
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