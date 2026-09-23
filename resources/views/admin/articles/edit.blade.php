
<h1>Edit {{$article->title}}</h1>
<form action="{{route('admin.articles.update',$article->id)}}" method="POST">
    @method('PUT')
    @csrf


    <div>
        <label for="content">Content</label><br>
        <textarea name="content" placeholder="Your article content">{{old('content', $article->content)}}</textarea>
        @error('content') <div style="color: red;">{{$message}} </div>  @enderror
    </div>

    <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{$article->title}}" />
    <x-form-number-input name="author_id" label="Author" placeholder="Author ID" value="{{$article->author_id}}" />

    <button type="submit">Save changes</button>
</form>
