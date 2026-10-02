<h1>Create new article</h1>
<form action="{{route('admin.articles.store')}}" method="POST">

    @csrf

    <x-form-text-input name="title" label="Title*" placeholder="Title" />
    <x-form-textarea name="content" label="Content" placeholder="Your article content" />
    <x-form-select name="author_id" label="Author" :options="$author_options" />
    <x-form-checkboxes name="keywords" label="Keywords" :options="$keyword_options"/>

    <button type="submit">Create article</button>
</form>
