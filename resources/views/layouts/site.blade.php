<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <title>Site title</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    </head>
    <body>
    <div class="bg-gray-200 p-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div>Logo</div>
            <div>
                @foreach($menu as $item)
                    <a href="{{$item['link']}}" style="padding-right: 8px;"> {{$item['label']}} </a>
                @endforeach
            </div>
            <div>
                @auth
                    <a href="{{route('admin.articles.index')}}">Article management</a>
                @else
                    <a href="{{route('login')}}">Login</a>
                @endauth
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-96">
        <div class="pt-8">
            {{ $slot }}
        </div>
    </div>


    <div class="bg-black text-green-300 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($menu as $item)
                <a href="{{$item['link']}}" style="padding-right: 8px; color: #03FF03;"> {{$item['label']}} </a><br/>
            @endforeach
        </div>
    </div>

    </body>
</html>

