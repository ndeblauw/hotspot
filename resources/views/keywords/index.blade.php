<x-site-layout>
    <x-site-page-header
        title="Keywords"
        lede="The tags we use across every article."
    />

    <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 md:mt-15 lg:grid-cols-3">
        @forelse($keywords as $keyword)
            <x-site-list-card
                :title="$keyword->name"
                :href="route('keywords.show', $keyword)"
                :count="$keyword->articles_count"
            />
        @empty
            <li class="text-body-s text-ink-muted">No keywords yet.</li>
        @endforelse
    </ul>
</x-site-layout>
