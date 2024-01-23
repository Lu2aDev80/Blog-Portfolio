<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('slug', $post->slug)" required />

            <div class="flex mt-1">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
                <div class="flex mt-1 ">
                    <div class="flex-1">
                        <x-form.input type="file"  name="images[]" multiple />
                </div>
            </div>

            @foreach ($post->images as $image)
                <div>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="/admin/posts/{{ $image->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs text-gray-400">Delete</button>
                        </form>
                    </td>
                    Löschen
                    {{$image->id}}
                    <img src="/{{ $image->url }}?w=100" alt="Blog Post illustration" class="rounded-xl h-8">
                </div>
            @endforeach

            <div class="flex mt-4 ">
                <div class="flex-1">
                    <x-form.textarea name="excerpt"  required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                </div>
            </div>

            <div class="flex mt-3 ">
                <div class="flex-1">
                    <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>                </div>
            </div>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
