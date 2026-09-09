
<h1>Edit {{$article->title}}</h1>
<form action="{{route('admin.articles.update',$article->id)}}" method="POST">
    @method('PUT')
    @csrf

    <div>
        <label for="title">Title</label><br>
        <input type="text" name="title" placeholder="Title" value="{{$article->title}}">
    </div>

    <div>
        <label for="content">Content</label><br>
        <textarea name="content" placeholder="Your article content">{{$article->content}}</textarea>
    </div>

    <div>
        <label for="title">Author</label><br>
        <input type="number" name="author_id" placeholder="Author ID" value="{{$article->author_id}}">
    </div>

    <button type="submit">Save changes</button>
</form>
