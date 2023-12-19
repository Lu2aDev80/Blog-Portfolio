<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Einloggen!</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <input name="email" type="email" autocomplete="username" required/>
                <input name="password" type="password" autocomplete="current-password" required/>

                <button>Einloggen</button>
            </form>
        </x-panel>
    </main>
</section>


