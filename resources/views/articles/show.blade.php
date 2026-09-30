<x-site-layout>

    @foreach($article->keywords as $keyword)
        <span class="bg-black text-green-200 text-xs rounded-full px-2">{{$keyword->name}}</span>
    @endforeach
    <h1 class="text-2xl font-bold">{{$article->title}}</h1>
    <p class="mt-1 mb-6">
        <i>Author:
            <a href="{{ route('authors.show', $article->author) }}">{{$article->author->name}}</a>
        </i>
    </p>

    <div>
        <p>{{$article->content}}</p>
    </div>

    <div class="py-1 border-t border-black mt-6 mb-8">
        <h2 class="text-green-600 mb-4">Comments</h2>
        @forelse($article->comments as $comment)
            <div class="ml-2 mb-2">
                <p class="text-xs font-semibold">{{ $comment->user->name }}</p>
                <p>{{ $comment->text }}</p>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>






</x-site-layout>
