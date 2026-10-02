@props([
    'href',
    'variant' => 'solid',
    'class' => '',
])

@php
    $tones = [
        'solid' => 'border-ink bg-accent-lime text-ink',
        'outline' => 'border-ink bg-transparent text-ink',
    ];

    $classes = 'pressable inline-flex w-fit items-center gap-2.5 rounded-[2px] border px-3.5 py-2.5 font-label text-label-m transition-all duration-[240ms] ease-in-out '.$tones[$variant];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes.' '.$class]) }}>
    {{ $slot }}
    <x-site-arrow class="size-4 shrink-0" />
</a>
