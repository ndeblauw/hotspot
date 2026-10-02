<footer class="mt-16 bg-ink text-paper">
    <div class="mx-auto max-w-[87.5rem] px-5 md:px-10">
        <div class="py-12 md:py-16 lg:py-20">
            <p class="max-w-[28rem] text-body-l text-paper-sunk">
                Notes on building software, from the people building it here.
            </p>
        </div>

        <nav class="border-t border-ink-soft py-10 md:py-12 lg:py-16">
            <h2 class="font-label text-label-s uppercase text-ink-faint">
                Explore
            </h2>

            <ul class="mt-8 grid gap-x-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($menu as $item)
                    <li class="flex flex-col items-start">
                        <a href="{{ $item['link'] }}" class="group inline-flex items-center gap-3 font-label text-label-s uppercase text-paper transition-colors duration-200 hover:text-paper-sunk">
                            <span aria-hidden="true" class="block size-2 shrink-0 bg-accent-lime"></span>
                            {{ $item['label'] }}
                            <x-site-arrow class="size-4 shrink-0" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="border-t border-ink-soft py-10 md:py-12 lg:py-16">
            <span class="block text-[clamp(44px,10vw,80px)] font-medium leading-[0.98] tracking-[-0.04em]">
                {{ config('app.name', 'Laravel') }}
            </span>
        </div>

        <div class="flex flex-col items-start justify-between gap-6 border-t border-ink-soft py-8 md:flex-row md:items-center">
            <span class="font-label text-label-s uppercase text-ink-faint">
                &copy; {{ now()->year }} {{ config('app.name', 'Laravel') }}
            </span>

            @auth
                <a href="{{ route('admin.articles.index') }}" class="group inline-flex items-center gap-2 font-label text-label-s uppercase text-paper transition-colors duration-200 hover:text-paper-sunk">
                    Article management
                    <x-site-arrow class="size-4 shrink-0" />
                </a>
            @else
                <a href="{{ route('login') }}" class="group inline-flex items-center gap-2 font-label text-label-s uppercase text-paper transition-colors duration-200 hover:text-paper-sunk">
                    Login
                    <x-site-arrow class="size-4 shrink-0" />
                </a>
            @endauth
        </div>
    </div>
</footer>
