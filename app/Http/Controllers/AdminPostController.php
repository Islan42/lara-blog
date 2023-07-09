<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;

class AdminPostController extends Controller
{
  public function index(){
    $posts = Post::paginate(50);
    
    return view('admin.posts.index', [
      'posts' => $posts,
    ]);
  }
  
  public function create(){
    return view('admin.posts.create', [
      'categories' => Category::all(),
    ]);
  }
  
  public function store(){
    $attributes = $this->validatePost();
    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    
    Post::create($attributes);
    
    return redirect('/')->with('success', 'Post added');
  }
  
  public function edit(Post $post){
    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => Category::all(),
    ]);
  }
  
  public function update(Post $post){
    $attributes = $this->validatePost($post);
    
    if ($attributes['thumbnail'] ?? false){
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }
    
    $post->update($attributes);
    
    return back()->with('success', 'Post Updated');
  }
  
  public function destroy(Post $post){
    $post->delete();
    
    return back()->with('success', 'Post Deleted');
  }
  
  protected function validatePost(?Post $post = null){
    $post ??= new Post();
    return request()->validate([
      'title' => 'required',
      'thumbnail' => $post->exists ? ['image'] : ['image', 'required'],
      'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')],
    ]);       
  }
}
