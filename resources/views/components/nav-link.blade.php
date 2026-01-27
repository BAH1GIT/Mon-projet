@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-2 pt-1 text-sm font-semibold text-blue-400 border-b-2 border-blue-400'
    : 'inline-flex items-center px-2 pt-1 text-sm font-medium text-slate-300 hover:text-white hover:border-b-2 hover:border-blue-400 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
