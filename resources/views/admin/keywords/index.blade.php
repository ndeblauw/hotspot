<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

    <div>
        <a href="{{ route('admin.keywords.create') }}">Create Keyword</a>
    </div>

    @foreach($keywords as $keyword)
        <div>
            {{ $keyword->name }}
            <a href="{{route('admin.keywords.edit',$keyword->id)}}" >edit</a>
            <form action="{{route('admin.keywords.destroy',$keyword->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
        </div>
    @endforeach

    </div>
</x-layouts::app>
