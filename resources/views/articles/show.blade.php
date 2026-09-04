<x-site-layout>

<h1>{{$article->title}}</h1>
<p><i>Author: {{$article->author->name}}</i></p>
<p>{{$article->content}}</p>

<h2>Comments</h2>
@forelse($article->comments as $comment)
    <div>
        <p><b>{{ $comment->user->name }}</b></p>
        <p>{{ $comment->text }}</p>
    </div>
@empty
    <p>No comments yet.</p>
@endforelse

<div>
    Footer comes here
</div>

</x-site-layout>
