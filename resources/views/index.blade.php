<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Веб-приложение для обучения общеобразовательным программам">
    <title>@yield('title', 'Обучение общеобразовательным программам')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    @include('include.header')
</header>

<main>
    @yield('content')
</main>

<footer>
    @include('include.footer')
</footer>
</body>
</html>
