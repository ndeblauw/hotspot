<x-site-layout>
    <article class="mx-auto max-w-[43rem]">
        <header>
            @if ($article->keywords->isNotEmpty())
                <ul class="mb-6 flex flex-wrap gap-2">
                    @foreach ($article->keywords as $index => $keyword)
                        <li>
                            <x-site-keyword-pill :keyword="$keyword" :index="$index" />
                        </li>
                    @endforeach
                </ul>
            @endif

            <h1 class="text-heading-2xl font-normal tracking-[-0.02em] text-ink">
                {{ $article->title }}
            </h1>

            <div class="mt-6 flex flex-wrap items-center gap-x-3 gap-y-1 font-label text-label-s uppercase text-ink-muted">
                @if ($article->author)
                    <a href="{{ route('authors.show', $article->author) }}" class="transition-colors duration-200 hover:text-ink">
                        {{ $article->author->name }}
                    </a>
                @else
                    <span>by unknown</span>
                @endif

                @if ($article->created_at)
                    <span aria-hidden="true" class="text-rule-strong">/</span>
                    <time datetime="{{ $article->created_at->toDateString() }}">{{ $article->created_at->isoFormat('D MMM YYYY') }}</time>
                @endif
            </div>
        </header>

        <div>
            <img src="{{$article->getFirstMediaUrl('images')}}">
        </div>

        <div class="mt-10 text-body-l text-ink-soft">
            {{ $article->content }}
        </div>
    </article>

    <section class="mx-auto mt-16 max-w-[43rem] border-t border-rule pt-10">
        <h2 class="font-label text-label-s uppercase text-ink-muted">
            Comments
        </h2>

        @forelse($article->comments as $comment)
            <div class="mt-8 border-l-2 border-accent-lime pl-4">
                <p class="font-label text-label-s uppercase text-ink-muted">
                    {{ $comment->user->name }}
                </p>
                <p class="mt-2 text-body-s text-ink-soft">{{ $comment->text }}</p>
            </div>
        @empty
            <p class="mt-8 text-body-s text-ink-muted">No comments yet.</p>
        @endforelse
    </section>
</x-site-layout>
