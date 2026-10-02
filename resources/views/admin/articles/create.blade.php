<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Create new article</h1>
    <form action="{{route('admin.articles.store')}}" method="POST">

        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" />
        <x-form-textarea name="content" label="Content" placeholder="Your article content" />
        <x-form-select name="author_id" label="Author" :options="$author_options" />
        <x-form-checkboxes name="keywords" label="Keywords" :options="$keyword_options"/>

        <button type="submit" class="border border-2 rounded padding-1">Create article</button>
    </form>

    </div>
</x-layouts::app>
