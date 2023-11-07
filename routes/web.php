<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
Router datei, definieren einer neuen seite mit:
Route::get('URL', function () {
   return view('view datei');
});
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all(),
    ]);
});

Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug),
    ]);
})->where('post', '[A-z_\-]+');
