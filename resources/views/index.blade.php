<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Веб-приложение для обучения общеобразовательным программам">
    <title>@yield('title', 'Обучение общеобразовательным программам')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
<header>
    @include('include.header')
</header>

<main class="flex-1">
    @yield('content')
</main>

<footer>
    @include('include.footer')
</footer>

<dialog id="delete-modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Подтверждение удаления</h3>
        <p id="delete-modal-text" class="py-4 text-base-content/70"></p>
        <div class="modal-action">
            <button type="button" class="btn btn-ghost" onclick="document.getElementById('delete-modal').close()">Отмена</button>
            <button id="delete-modal-confirm" class="btn btn-error">Удалить</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>Закрыть</button>
    </form>
</dialog>


</body>
</html>
