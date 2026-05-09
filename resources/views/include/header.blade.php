<nav class="navbar bg-base-100 shadow-md px-6">

    <div class="flex-1">
        <ul class="menu menu-horizontal gap-2">
            <li>
                <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Главная</a>
            </li>
            <li>
                <a href="{{ route('lessons') }}" class="btn btn-ghost btn-sm">Предметы</a>
            </li>
            <li>
                <a href="{{ route('subjects') }}" class="btn btn-ghost btn-sm">Занятия</a>
            </li>
            <li>
                <a href="{{ route('tests') }}" class="btn btn-ghost btn-sm">Тесты</a>
            </li>
        </ul>
    </div>

    <div class="flex-none">
        <a href="{{ route('profile') }}" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img src="" alt="profile">
            </div>
        </a>
    </div>

</nav>
