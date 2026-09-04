<x-site-layout>

    <h1>Articles overview</h1>
    <p>This is the full content of our blog</p>
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/articles/{{ $article->id }}">
                    <b>{{ $article->title }}</b>
                </a>
                by {{$article->author}}
            </li>
        @endforeach
    </ul>


</x-site-layout>
