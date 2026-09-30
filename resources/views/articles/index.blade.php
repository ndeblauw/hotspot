<x-site-layout>

    <h1 class="text-2xl font-bold">Articles overview</h1>
    <p>This is the full content of our blog</p>
    <ul class="grid grid-cols-3 mt-8 gap-8">
        @foreach($articles as $article)
            <li class=" p-1 border-t border-black hover:bg-gray-200">
                @foreach($article->keywords as $keyword)
                    <span class="bg-black text-green-200 text-xs rounded-full px-2">{{$keyword->name}}</span>
                @endforeach

                <a class="block text-xl font-semibold" href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
                @if($article->author)
                    <a class="italic text-sm" href="{{ route('authors.show', $article->author) }}">by {{ $article->author->name }}</a>
                @else
                    <span class="italic text-sm">by unknown</span>
                @endif
                <a class="block mt-4 text-gray-700" href="{{ route('articles.show', $article) }}">
                    {{ Str::limit($article->content,100) }}
                </a>
            </li>
        @endforeach
    </ul>


</x-site-layout>
