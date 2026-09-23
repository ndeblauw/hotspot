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
    <div style="background-color: #f0f0f0; padding: 10px;">
        Logo |
        @foreach($menu as $item)
            <a href="{{$item['link']}}" style="padding-right: 8px;"> {{$item['label']}} </a>
        @endforeach

        @auth
            <a href="{{route('admin.articles.index')}}">Article management</a>
        @else
            <a href="{{route('login')}}">Login</a>
        @endauth
    </div>

    <div class="pl-4 pt-4">
        {{ $slot }}
    </div>

    <div style="background-color: #000000; padding: 10px; color: #03FF03;">
        @foreach($menu as $item)
            <a href="{{$item['link']}}" style="padding-right: 8px; color: #03FF03;"> {{$item['label']}} </a><br/>
        @endforeach
    </div>

    </body>
</html>

