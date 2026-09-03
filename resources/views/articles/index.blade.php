<div>
    Header comes here
</div>

<h1>Articles overview</h1>
<p>This is the full content of our blog</p>
<ul>
@foreach($articles as $article)
    <li><b>{{ $article->title }}</b> by {{$article->author}}</li>
@endforeach
</ul>

<div>
    Footer comes here
</div>

