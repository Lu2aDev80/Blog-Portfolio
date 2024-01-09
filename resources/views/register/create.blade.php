<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Registrieren!</h1>

            <form method="POST" action="/register" class="mt-10">
                @csrf

                <input name="name" placeholder="Name" required/>
                <input name="username" placeholder="Nutzername" required/>
                <input name="email" type="email" placeholder="E-Mail" required/>
                <input name="password" type="password" autocomplete="new-password" placeholder="Password" required/>
                <button>Registrieren</button>
            </form>
        </x-panel>
    </main>
</section>

