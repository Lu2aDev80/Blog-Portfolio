<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));


        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        if (request()->file("images")){
            foreach( request()->file('images') as $imagefile) {
                $image = new Image;
                // $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
                $path = Storage::putFile("/images/resource", $imagefile);
                $image->url = $path;
                $image->post_id = $post->id;
                $image->save();
        }
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:855',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        foreach ($request->file('images') as $imagefile) {
            $image = new Image;
            // $path = $imagefile->store('/../storage/app/images/resource', ['disk' =>   'my_files']);
            $path = Storage::putFile("/images/resource", $imagefile);
            $image->url = $path;
            $image->product_id = $product->id;
            $image->save();
        }}
}
