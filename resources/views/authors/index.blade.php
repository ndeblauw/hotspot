<x-site-layout>

    <h1 class="text-2xl font-bold">Authors overview</h1>
    <p>Everyone who has written an article on this blog</p>

    <ul class="grid grid-cols-3 mt-8 gap-8">
        @forelse($authors as $author)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                <a class="block text-xl font-semibold" href="{{ route('authors.show', $author) }}">
                    {{ $author->name }}
                </a>
                <span class="italic text-sm">{{ $author->articles_count }} {{ Str::plural('article', $author->articles_count) }}</span>
            </li>
        @empty
            <li>No authors yet.</li>
        @endforelse
    </ul>

</x-site-layout>
