<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Cooking Recipe</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <Welcome></Welcome>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>