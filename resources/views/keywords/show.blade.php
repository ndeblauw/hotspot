<x-site-layout>

    <h1 class="text-2xl font-bold">{{ $keyword->name }}</h1>
    <p class="mt-1 mb-6"><i>{{ $keyword->articles_count }} {{ Str::plural('article', $keyword->articles_count) }}</i></p>

    <ul class="grid grid-cols-3 gap-8">
        @forelse($articles as $article)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                <a class="block text-xl font-semibold" href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
                @if($article->author)
                    <a class="italic text-sm" href="{{ route('authors.show', $article->author) }}">by {{ $article->author->name }}</a>
                @else
                    <span class="italic text-sm">by unknown</span>
                @endif
                <a class="block mt-4 text-gray-700" href="{{ route('articles.show', $article) }}">
                    {{ Str::limit($article->content, 100) }}
                </a>
            </li>
        @empty
            <li>No articles for this keyword yet.</li>
        @endforelse
    </ul>

</x-site-layout>
