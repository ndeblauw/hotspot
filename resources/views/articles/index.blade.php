<x-site-layout>

    <h1 class="text-2xl font-bold">Articles overview</h1>
    <p>This is the full content of our blog</p>
    <ul class="list-disc list-inside">
        @foreach($articles as $article)
            <li>
                <a href="/articles/{{ $article->id }}">
                    {{ $article->title }}
                </a>
                by {{$article->author?->name ?? 'unknown'}}
            </li>
        @endforeach
    </ul>


</x-site-layout>
