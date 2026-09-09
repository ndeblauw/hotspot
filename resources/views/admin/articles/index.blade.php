@foreach($articles as $article)
    <div>
        {{ $article->title }}  <a href="" >edit</a> <a href="" >delete</a>
    </div>
@endforeach
