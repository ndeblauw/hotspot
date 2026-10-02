@props([
    'href' => null,
])

@php
    $classes = 'group inline-flex items-center gap-3';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        <span aria-hidden="true" class="block size-2.5 shrink-0 bg-accent-lime transition-transform duration-200 group-hover:scale-125"></span>
        <span class="text-heading-m font-medium tracking-[-0.02em]">{{ config('app.name', 'Laravel') }}</span>
    </a>
@else
    <span {{ $attributes->merge(['class' => $classes]) }}>
        <span aria-hidden="true" class="block size-2.5 shrink-0 bg-accent-lime transition-transform duration-200 group-hover:scale-125"></span>
        <span class="text-heading-m font-medium tracking-[-0.02em]">{{ config('app.name', 'Laravel') }}</span>
    </span>
@endif
