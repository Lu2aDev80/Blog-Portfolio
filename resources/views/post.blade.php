<article>
    <h1>
        {{ $post->title }}
    </h1>

    <p>
        @foreach($post->categories as $category)
        <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
        @endforeach
    </p>

    <div>
        {{ $post->body }}
    </div>

    <a href="/">
        BACK
    </a>
</article>
