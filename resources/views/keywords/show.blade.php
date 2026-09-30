<x-site-layout>
    <x-site-page-header :title="$keyword->name">
        <p class="mt-4 font-label text-label-s uppercase text-ink-muted">
            {{ $keyword->articles_count }} {{ Str::plural('article', $keyword->articles_count) }}
        </p>
    </x-site-page-header>

    <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 md:mt-15 lg:grid-cols-3">
        @forelse($articles as $article)
            <x-site-article-card :article="$article" />
        @empty
            <li class="text-body-s text-ink-muted">No articles for this keyword yet.</li>
        @endforelse
    </ul>
</x-site-layout>
