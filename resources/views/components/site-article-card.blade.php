@props([
    'article',
])

<li class="flex flex-col border-t border-rule pt-6 transition-colors duration-200 hover:border-ink">
    @if ($article->keywords->isNotEmpty())
        <ul class="mb-5 flex flex-wrap gap-2">
            @foreach ($article->keywords as $index => $keyword)
                <li>
                    <x-site-keyword-pill :keyword="$keyword" :index="$index" />
                </li>
            @endforeach
        </ul>
    @endif

    <h2 class="text-heading-l font-normal tracking-[-0.02em]">
        <a href="{{ route('articles.show', $article) }}" class="rule-in inline-block border-accent-lime text-ink">
            {{ $article->title }}
        </a>
    </h2>

    <div class="mt-3 flex flex-wrap items-center gap-x-3 gap-y-1 font-label text-label-s text-ink-muted">
        @if ($article->author)
            <a href="{{ route('authors.show', $article->author) }}" class="transition-colors duration-200 hover:text-ink">
                by {{ $article->author->name }}
            </a>
        @else
            <span>by unknown</span>
        @endif

        @if ($article->created_at)
            <span aria-hidden="true" class="text-rule-strong">/</span>
            <time datetime="{{ $article->created_at->toDateString() }}">{{ $article->created_at->isoFormat('D MMM YYYY') }}</time>
        @endif
    </div>

    <p class="mt-5 flex-1 text-body-s text-ink-muted">
        {{ Str::limit($article->content, 140) }}
    </p>

    <a href="{{ route('articles.show', $article) }}" class="mt-5 inline-flex w-fit items-center gap-3 font-label text-label-s text-ink transition-colors duration-200 hover:text-ink-muted">
        Read
        <x-site-arrow class="size-4 shrink-0" />
    </a>
</li>
