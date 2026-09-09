
<div>
    <a href="{{ route('admin.articles.create') }}">Create Article</a>
</div>

@foreach($articles as $article)
    <div>
        {{ $article->title }}
        <a href="{{route('admin.articles.edit',$article->id)}}" >edit</a>
        <form action="{{route('admin.articles.destroy',$article->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">delete</button>
        </form>
    </div>
@endforeach
