<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
Router datei, definieren einer neuen seite mit:
Route::get('URL', function () {
   return view('view datei');
});
*/

/*
 * Solved N+1 Problem
 */

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);
});
Route::get('posts/{post}', function ($id) {
   return view('post', [
        'post' => Post::findOrFail($id)
   ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
