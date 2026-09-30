<x-site-layout>

    <h1 class="text-2xl font-bold">Keywords overview</h1>
    <p>All keywords used to tag our articles</p>

    <ul class="grid grid-cols-3 mt-8 gap-8">
        @forelse($keywords as $keyword)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                <a class="block text-xl font-semibold" href="{{ route('keywords.show', $keyword) }}">
                    {{ $keyword->name }}
                </a>
                <span class="italic text-sm">{{ $keyword->articles_count }} {{ Str::plural('article', $keyword->articles_count) }}</span>
            </li>
        @empty
            <li>No keywords yet.</li>
        @endforelse
    </ul>

</x-site-layout>
