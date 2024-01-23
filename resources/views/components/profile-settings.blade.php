@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Aktionen</h4>

            <ul>
                <li>
                    <div
                        href="#"
                        x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()"
                    >
                        <img width="20" height="20" src="https://img.icons8.com/ios/50/logout-rounded--v1.png" alt="logout-rounded--v1" class="cursor-pointer"/>
                    </div>
                </li>


            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
