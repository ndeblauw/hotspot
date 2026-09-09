
<div>
    <a href="{{ route('admin.articles.create') }}">Create Article</a>
</div>

@foreach($articles as $article)
    <div>
        {{ $article->title }}  <a href="" >edit</a> <a href="" >delete</a>
    </div>
@endforeach
