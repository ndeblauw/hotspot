<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Edit {{$article->title}}</h1>

    <form action="{{route('admin.articles.update',$article->id)}}" method="POST">
        @method('PUT')
        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{$article->title}}" />
        <x-form-textarea name="content" label="Content" placeholder="Your article content" value="{{$article->content}}" />
        <x-form-select name="author_id" label="Author" :options="$author_options" value="{{$article->author_id}}" />
        <x-form-checkboxes name="keywords" label="Keywords" :values="$article->keywords->pluck('id')->toArray()" :options="$keyword_options"/>
        <button type="submit" class="border border-2 rounded padding-1">Save changes</button>
    </form>

    </div>
</x-layouts::app>
