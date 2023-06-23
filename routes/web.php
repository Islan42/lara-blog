<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
// use Spatie\YamlFrontMatter\YamlFrontMatter;
// use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('posts', [
      'posts' => $posts,
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    
    return view('post', [
      'post' => $post,
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
  $posts = $category->posts;
  return view('posts', [
    'posts' => $posts,
  ]);
});

Route::get('/authors/{author:username}', function(User $author){
  $posts = $author->posts;
  return view('posts', [
    'posts' => $posts,
  ]);
});
