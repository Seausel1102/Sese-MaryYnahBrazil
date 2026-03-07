@props([
    'active' => false,
])

<a {{ $attributes->merge(['class' => 'nav-link ' . ($active ? 'active' : '')]) }}
   aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>