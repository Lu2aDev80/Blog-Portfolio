<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Einloggen!</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required/>
                    <x-form.input name="password" type="password" autocomplete="current-password" required/>

                    <x-form.button>Einloggen</x-form.button>
                    <div id="google" class="mt-4">
                            <img width="30" height="30" src="https://img.icons8.com/color/48/google-logo.png" alt="google-logo"/>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>


