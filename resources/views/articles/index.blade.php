<x-site-layout>
    <x-site-page-header
        title="Articles"
        lede="Everything we have written so far."
    />

    <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 md:mt-15 lg:grid-cols-3">
        @forelse($articles as $article)
            <x-site-article-card :article="$article" />
        @empty
            <li class="text-body-s text-ink-muted">No articles yet.</li>
        @endforelse
    </ul>
</x-site-layout>
