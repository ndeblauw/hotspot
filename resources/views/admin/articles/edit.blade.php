
<h1>Edit {{$article->title}}</h1>
<form action="{{route('admin.articles.update',$article->id)}}" method="POST">
    @method('PUT')
    @csrf

    <div>
        <label for="title">Title*</label><br>
        <input type="text" name="title" placeholder="Title" value="{{old('title',$article->title)}}">
        @error('title') <div style="color: red;">{{$message}} </div>  @enderror
    </div>

    <div>
        <label for="content">Content</label><br>
        <textarea name="content" placeholder="Your article content">{{old('content', $article->content)}}</textarea>
        @error('content') <div style="color: red;">{{$message}} </div>  @enderror
    </div>

    <div>
        <label for="title">Author</label><br>
        <input type="number" name="author_id" placeholder="Author ID" value="{{old('author_id', $article->author_id)}}">
        @error('author_id') <div style="color: red;">{{$message}} </div>  @enderror
    </div>

    <button type="submit">Save changes</button>
</form>
