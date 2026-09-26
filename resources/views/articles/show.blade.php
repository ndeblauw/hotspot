<x-site-layout>

<h1>{{$article->title}}</h1>
<hr/>
<p><i>Author: {{$article->author->name}}</i></p>
<p><i>Keywords:</i> @foreach($article->keywords as $keyword){{$keyword->name}}, @endforeach</p>
<hr/>
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
