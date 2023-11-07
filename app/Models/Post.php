<?php

namespace App\Models;
//namestaces
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    //Auflisten aller dateien in bestimmtem ordner
    public static function all() {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    // Anzeigen eines einzelnen eintrags mit hilfe der $slug funktion (ausledes der url nach spezifischem datei namen
    public static function find($slug)
    {

        base_path();
            if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
                throw new ModelNotFoundException();
            }

        //Speicher im cache (keine unnötigen recourcen verschwenden bei neuladen innerhalb bestimmtem zeitraum)
        return cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));

    }
}
