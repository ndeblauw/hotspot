<x-site-layout>
    <x-site-page-header
        title="Authors"
        lede="Everyone who has written an article here."
    />

    <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 md:mt-15 lg:grid-cols-3">
        @forelse($authors as $author)
            <x-site-list-card
                :title="$author->name"
                :href="route('authors.show', $author)"
                :count="$author->articles_count"
            />
        @empty
            <li class="text-body-s text-ink-muted">No authors yet.</li>
        @endforelse
    </ul>
</x-site-layout>
