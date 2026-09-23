<h1>Create new article</h1>
<form action="{{route('admin.articles.store')}}" method="POST">

    @csrf

    <x-form-text-input name="title" label="Title*" placeholder="Title" />
    <x-form-textarea name="content" label="Content" placeholder="Your article content" />
    <x-form-number-input name="author_id" label="Author" placeholder="Author ID" />

    <button type="submit">Create article</button>
</form>
