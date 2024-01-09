<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())
        <x-posts-grid :posts="$posts"/>

        {{ $posts->links() }}
    @else
        <p class="text-center">Noch nichts da. Schau später noch einmal nach.</p>
    @endif

    <a href="/"><button>Zurück zur Hauptseite</button></a>
</main>

