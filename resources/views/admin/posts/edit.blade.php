<form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input name="title" :value="old('title', $post->title)" required/>
    <input name="slug" :value="old('slug', $post->slug)" required/>

    <div class="flex mt-6">
        <div class="flex-1">
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
        </div>

        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
    </div>

    <textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</textarea>
    <textarea name="body" required>{{ old('body', $post->body) }}</textarea>

    <label name="category"/>

        <select name="category_id" id="category_id" required>
            @foreach (\App\Models\Category::all() as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                >{{ ucwords($category->name) }}</option>
            @endforeach
        </select>

    <error name="category"/>

    <button>Update</button>
</form>
