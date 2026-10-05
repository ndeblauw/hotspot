<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <h1>Edit {{$article->title}}</h1>

    <form action="{{route('admin.articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{$article->title}}" />
        <x-form-textarea name="content" label="Content" placeholder="Your article content" value="{{$article->content}}" />
        <x-form-select name="author_id" label="Author" :options="$author_options" value="{{$article->author_id}}" />
        <x-form-checkboxes name="keywords" label="Keywords" :values="$article->keywords->pluck('id')->toArray()" :options="$keyword_options"/>

        {{-- Ideally this becomes a component, think also how fancy/ux-ui friendly you can make it --}}
        <input type="file" name="image"><br/><br/>
        @error('image') <div class="font-label text-label-s text-accent-pumpkin">{{$message}}</div> @enderror

        <button type="submit" class="pressable inline-flex w-fit items-center gap-2.5 rounded-[2px] border border-ink bg-accent-lime px-3.5 py-2.5 font-label text-label-m text-ink transition-all duration-[240ms] ease-in-out">Save changes</button>
    </form>

    </div>
</x-layouts::app>
