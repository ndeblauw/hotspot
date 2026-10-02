@props([
    'keyword',
    'index' => 0,
])

@php
    /**
     * @var list<string> $tones
     */
    $tones = [
        'bg-accent-lime text-ink',
        'bg-accent-mint text-ink',
        'bg-accent-rose text-ink',
        'bg-accent-orchid text-paper',
        'bg-accent-pumpkin text-ink',
    ];

    $classes = 'inline-flex rounded-full border border-ink px-3 py-1.5 font-label text-label-s transition-transform duration-200 hover:-translate-y-0.5 '.$tones[$index % count($tones)];
@endphp

<a href="{{ route('keywords.show', $keyword) }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $keyword->name }}
</a>
