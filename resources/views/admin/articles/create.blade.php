<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Create new article</h1>
    <form action="{{route('admin.articles.store')}}" method="POST">

        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" />
        <x-form-textarea name="content" label="Content" placeholder="Your article content" />
        <x-form-select name="author_id" label="Author" :options="$author_options" />
        <x-form-checkboxes name="keywords" label="Keywords" :options="$keyword_options"/>

        <button type="submit" class="pressable inline-flex w-fit items-center gap-2.5 rounded-[2px] border border-ink bg-accent-lime px-3.5 py-2.5 font-label text-label-m text-ink transition-all duration-[240ms] ease-in-out">Create article</button>
    </form>

    </div>
</x-layouts::app>
