@php use App\Models\Category; @endphp

<form method="POST" action="/admin/posts" enctype="multipart/form-data">
    @csrf

    <input name="title" required/>
    <input name="slug" required/>
    <input name="thumbnail" type="file" required/>
    <textarea name="excerpt" required/>
    <textarea name="body" required/>

    <field>
        <label name="category"/>

        <label for="category_id"></label><select name="category_id" id="category_id" required>
            @foreach (Category::all() as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                >{{ ucwords($category->name) }}</option>
            @endforeach
        </select>

        <error name="category"/>
    </field>

    <button>Publish</button>
</form>
