<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Site title</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    </head>
    <body>
    <div style="background-color: #f0f0f0; padding: 10px;">
        Logo |
        <a href="\">Home</a>
        <a href="\articles">Articles</a>
    </div>

    {{ $slot }}

    <div style="background-color: #000000; padding: 10px; color: #03FF03;">
        Footer comes here
    </div>

    </body>
</html>

