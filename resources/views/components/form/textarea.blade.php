@props(['name'])

<field>
    <label name="{{ $name }}" />

    <textarea
        class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

    <error name="{{ $name }}" />
</field>
