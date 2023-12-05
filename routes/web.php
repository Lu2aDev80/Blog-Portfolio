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

    ]);
});
Route::get('posts/{post}', function ($id) {
   return view('post', [
        'post' => Post::findOrFail($id)
   ]);
});
