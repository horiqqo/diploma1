<header class="w-full border border-base-200 bg-base-100">
    <div class="navbar px-6 min-h-[90px]">

        <div class="flex-1">
            <a class="text-base ">
                logo
            </a>
        </div>

        <div class="flex-none hidden md:flex">
            <ul class="menu menu-horizontal gap-2 text-lg">
                <li>
                    <a href="{{route('home')}}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                        Главная
                    </a>
                </li>
                <li>
                    <a href="{{route('subjects')}}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                        Предметы
                    </a>
                </li>
            </ul>
        </div>

        <div class="flex flex-1 justify-end items-center gap-7">
            <button class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/moon.svg') }}" alt="Сменить тему" class="w-7 h-7 object-contain">
            </button>

            <button class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/eye.svg') }}" alt="Версия для слабовидящих" class="w-7 h-7 object-contain">
            </button>

            <button class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/profile.svg') }}" alt="Профиль" class="w-7 h-7 object-contain">
            </button>

        </div>
    </div>
</header>





