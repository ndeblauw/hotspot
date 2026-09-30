@props([
    'menu' => [],
])

<header class="sticky top-0 z-50 border-b border-rule bg-paper/90 backdrop-blur">
    <div class="mx-auto max-w-[87.5rem] px-5 md:px-10">
        <div class="flex h-16 items-center justify-between gap-6">
            <x-site-logo :href="route('home')" />

            <nav class="hidden items-center gap-8 md:flex" aria-label="Primary">
                @foreach ($menu as $item)
                    <x-site-nav-link
                        :label="$item['label']"
                        :href="$item['link']"
                        :active="request()->routeIs($item['match'])"
                    />
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <x-site-button :href="route('admin.articles.index')" class="hidden sm:inline-flex">
                        Article management
                    </x-site-button>
                @else
                    <x-site-button :href="route('login')" class="hidden sm:inline-flex">
                        Login
                    </x-site-button>
                @endauth

                <button
                    type="button"
                    data-site-nav-toggle
                    aria-expanded="false"
                    aria-controls="site-mobile-nav"
                    class="inline-flex size-10 items-center justify-center rounded-[2px] border border-ink text-ink transition-colors duration-200 hover:bg-paper-sunk md:hidden"
                >
                    <span class="sr-only">Toggle navigation</span>

                    <svg data-site-nav-icon="open" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" />
                    </svg>

                    <svg data-site-nav-icon="close" class="hidden size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="site-mobile-nav" data-site-nav-panel class="nav-panel md:hidden" data-open="false">
        <div>
            <nav class="border-t border-rule bg-paper px-5 pb-6 md:px-10" aria-label="Primary mobile">
                <ul class="flex flex-col">
                    @foreach ($menu as $item)
                        <li class="border-b border-rule">
                            <x-site-nav-link
                                :label="$item['label']"
                                :href="$item['link']"
                                :active="request()->routeIs($item['match'])"
                                variant="mobile"
                            />
                        </li>
                    @endforeach
                </ul>

                <div class="pt-6">
                    @auth
                        <x-site-button :href="route('admin.articles.index')" class="w-full justify-between">
                            Article management
                        </x-site-button>
                    @else
                        <x-site-button :href="route('login')" class="w-full justify-between">
                            Login
                        </x-site-button>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>
