<x-site-layout>

    <h1 class="text-2xl font-bold">{{ $author->name }}</h1>
    <p class="mt-1 mb-6"><i>{{ $author->articles_count }} {{ Str::plural('article', $author->articles_count) }}</i></p>

    <ul class="grid grid-cols-3 gap-8">
        @forelse($articles as $article)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                @foreach($article->keywords as $keyword)
                    <a class="bg-black text-green-200 text-xs rounded-full px-2" href="{{ route('keywords.show', $keyword) }}">{{ $keyword->name }}</a>
                @endforeach

                <a class="block text-xl font-semibold" href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
                <span class="italic text-sm">{{ $article->created_at?->toFormattedDateString() }}</span>
                <a class="block mt-4 text-gray-700" href="{{ route('articles.show', $article) }}">
                    {{ Str::limit($article->content, 100) }}
                </a>
            </li>
        @empty
            <li>This author has no articles yet.</li>
        @endforelse
    </ul>

</x-site-layout>
