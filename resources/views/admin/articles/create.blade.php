
<h1>Create new article</h1>
<form action="{{route('admin.articles.store')}}" method="POST">

    @csrf


    <div>
        <label for="content">Content</label><br>
        <textarea name="content" placeholder="Your article content">{{old('content')}}</textarea>
        @error('content') <div style="color: red;">{{$message}} </div>  @enderror
    </div>

    <div>
        <label for="title">Author</label><br>
        <input type="number" name="author_id" placeholder="Author ID" value="{{old('author_id')}}">
        @error('author_id') <div style="color: red;">{{$message}} </div>  @enderror
    </div>
    <x-form-text-input name="title" label="Title*" placeholder="Title" />

    <button type="submit">Create article</button>
</form>
