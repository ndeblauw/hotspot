
<h1>Edit {{$article->title}}</h1>

<form action="{{route('admin.articles.update',$article->id)}}" method="POST">
    @method('PUT')
    @csrf

    <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{$article->title}}" />
    <x-form-textarea name="content" label="Content" placeholder="Your article content" value="{{$article->content}}" />
    <x-form-number-input name="author_id" label="Author" placeholder="Author ID" value="{{$article->author_id}}" />

    <button type="submit">Save changes</button>
</form>
