<article>
    <h1>
        {{ $post->title }}
    </h1>

    <p>
        <a href="#">{{ $post->category->name }}</a> //fix this
    </p>

    <div>
        {{ $post->body }}
    </div>

    <a href="/">
        BACK
    </a>
</article>
