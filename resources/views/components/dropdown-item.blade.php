@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 focus:bg-blue-500 focus:text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}
>{{ $slot }}</a>
