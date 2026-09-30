@props([
    'title',
    'lede' => null,
])

<div {{ $attributes->merge(['class' => 'max-w-[43rem]']) }}>
    <h1 class="text-heading-2xl font-normal tracking-[-0.02em] text-ink">{{ $title }}</h1>

    @if ($lede)
        <p class="mt-6 text-body-l text-ink-muted">{{ $lede }}</p>
    @endif

    {{ $slot }}
</div>
