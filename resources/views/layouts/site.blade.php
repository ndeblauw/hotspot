<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/favicon.ico" sizes="any" />
        <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

        <title>
            {{ filled($title ?? null) ? $title.' - '.config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
        </title>
        <meta name="description" content="{{ $description ?? '' }}" />

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/site-nav.js'])
    </head>

    <body class="bg-paper font-sans text-ink antialiased">
        <div class="flex min-h-screen flex-col">
            <x-site-header :menu="$menu" />

            <main class="flex-1">
                <div class="mx-auto max-w-[87.5rem] px-5 py-10 md:px-10 md:py-15 lg:py-20">
                    {{ $slot }}
                </div>
            </main>

            <x-site-footer :menu="$menu" />
        </div>
    </body>
</html>
