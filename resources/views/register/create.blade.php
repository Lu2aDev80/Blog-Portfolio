<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Registrieren!</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name" placeholder="Name" required/>
                    <x-form.input name="username" placeholder="Nutzername" required/>
                    <x-form.input name="email" type="email" placeholder="E-Mail" required/>
                    <x-form.input name="password" type="password" autocomplete="new-password" placeholder="Password" required/>
                    <x-form.button>Registrieren</x-form.button>
                    <div id="google" class="mt-4">
                        <img width="30" height="30" src="https://img.icons8.com/color/48/google-logo.png" alt="google-logo"/>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>


