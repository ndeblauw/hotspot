@props([
    'title',
    'href',
    'count' => 0,
    'label' => 'article',
])

<li class="flex flex-col border-t border-rule pt-6 transition-colors duration-200 hover:border-ink">
    <h2 class="text-heading-l font-normal tracking-[-0.02em]">
        <a href="{{ $href }}" class="rule-in inline-block border-accent-lime text-ink">
            {{ $title }}
        </a>
    </h2>

    <p class="mt-3 font-label text-label-s text-ink-muted">
        {{ $count }} {{ Str::plural($label, $count) }}
    </p>
</li>
