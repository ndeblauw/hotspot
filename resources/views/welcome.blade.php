<x-site-layout>
    <div class="mx-auto max-w-[87.5rem] px-5 md:px-10">
        <x-site-page-header title="Hello from the welcome page" lede="Fresh articles, authors and keywords live here." />

        <div class="mt-10 flex flex-wrap gap-4">
            <x-site-button :href="route('articles.index')">Browse articles</x-site-button>
            <x-site-button :href="route('authors.index')" variant="outline">Meet the authors</x-site-button>
            <x-site-button :href="route('keywords.index')" variant="outline">Explore keywords</x-site-button>
        </div>
    </div>
</x-site-layout>
