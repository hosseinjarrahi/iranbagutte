<!DOCTYPE html>
<html >
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        body {
            direction: rtl;
            background-image: url("img/loginBack.jpg");
            background-size: cover;
        }
    </style>
    {!! htmlScriptTagJsApi(['lang'=>'fa']) !!}
</head>
<body>

    @yield('menu')

</body>
</html>