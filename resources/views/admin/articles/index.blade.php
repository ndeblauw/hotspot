<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-8">

    <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-heading-l font-normal tracking-[-0.02em] text-ink">Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="pressable inline-flex w-fit items-center gap-2.5 rounded-[2px] border border-ink bg-accent-lime px-3.5 py-2.5 font-label text-label-m text-ink transition-all duration-[240ms] ease-in-out">
            Create article
            <x-site-arrow class="size-4 shrink-0" />
        </a>
    </div>

    <ul class="flex flex-col">
        @forelse($articles as $article)
            <li class="flex flex-wrap items-center justify-between gap-4 border-t border-rule py-4 transition-colors duration-200 hover:border-ink">
                <span class="text-body-s text-ink">{{ $article->title }}</span>

                <div class="flex items-center gap-4 font-label text-label-s">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-ink transition-colors duration-200 hover:text-ink-muted">Edit</a>

                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-accent-pumpkin transition-colors duration-200 hover:text-ink">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="border-t border-rule py-4 text-body-s text-ink-muted">No articles yet.</li>
        @endforelse
    </ul>

    </div>
</x-layouts::app>
