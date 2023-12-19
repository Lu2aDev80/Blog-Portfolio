<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();
        //User erstellen
       $user = User::factory()->create();
        //post categorien erstellen
       $personal = Category::create([
           'name' => 'Personal',
           'slug' => 'personal'
       ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $hobby = Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);
        //Posts erstellen
        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'MY Personal Blog Post',
            'slug' => 'personal',
            'excerpt' => 'A blog about my personal live',
            'body' => 'Something personal'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'MY Work Blog Post',
            'slug' => 'work',
            'excerpt' => 'A blog about my work',
            'body' => 'Something about my work'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'MY Hobby Blog Post',
            'slug' => 'hobby',
            'excerpt' => 'A blog about my hobbies',
            'body' => 'Something about my hobby'
        ]);
    }
}
