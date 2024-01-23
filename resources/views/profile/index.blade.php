<x-layout>
    <x-profile-settings heading="My Profile">

        <ul>
            <li>
                Name:    {{ auth()->user()->name }}
            </li>
            <li>
                Benutzername:   {{ auth()->user()->username }}
            </li>
            <li>
                E-Mail:     {{ auth()->user()->email }}
            </li>
        </ul>

        <p class="mt-4 block text-grey-400 text-l">
            Account erstellt am
            <time>{{ auth()->user()->created_at }}</time>
        </p>
    </x-profile-settings>
</x-layout>
