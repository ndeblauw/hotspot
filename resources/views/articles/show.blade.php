<x-site-layout>

<h1>{{$article->title}}</h1>
<p><i>Author: {{$article->author->name}}</i></p>
<p>{{$article->content}}</p>
<div>
    Footer comes here
</div>

</x-site-layout>
