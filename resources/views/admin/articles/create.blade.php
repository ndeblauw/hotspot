
<h1>Create new article</h1>
<form action="{{route('admin.articles.store')}}" method="POST">

    @csrf

    <div>
        <label for="title">Title</label><br>
        <input type="text" name="title" placeholder="Title">
    </div>

    <div>
        <label for="content">Content</label><br>
        <textarea name="content" placeholder="Your article content"></textarea>
    </div>

    <div>
        <label for="title">Author</label><br>
        <input type="number" name="author_id" placeholder="Author ID" value="1">
    </div>

    <button type="submit">Create article</button>
</form>
