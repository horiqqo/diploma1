<header class="w-full border border-base-200 bg-base-100">
    <div class="navbar px-6 min-h-[30px]">
        <div class="flex-1">
            <a class="text-base">logo</a>
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

        <div class="hidden md:flex flex-1 justify-end items-center gap-7">
            <button id="btn-theme" class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/moon.svg') }}" alt="Сменить тему" class="w-7 h-7 object-contain">
            </button>
            <button id="btn-accessible" class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/eye.svg') }}" alt="Версия для слабовидящих" class="w-7 h-7 object-contain">
            </button>
            <a href="{{route('profile')}}" id="btn-profile" class="transition hover:scale-110 duration-200 cursor-pointer">
                <img src="{{ asset('../images/icons/profile.svg') }}" alt="Профиль" class="w-7 h-7 object-contain">
            </a>
        </div>

        <div class="flex md:hidden justify-end flex-1">
            <button id="btn-burger" class="cursor-pointer">
                <img id="burger-icon" src="{{asset('../images/icons/burger-menu.svg')}}" alt="мобильное меню" class="w-7 h-7">
            </button>
        </div>

    </div>

    <div id="mobile-menu"
              class="hidden fixed inset-0 top-0 z-50 bg-base-100 flex flex-col px-6 py-6 gap-6
            opacity-0 translate-x-full transition-all duration-300 ease-in-out">

        <div class="flex items-center justify-between">
            <a class="text-base">logo</a>
            <button id="btn-close" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="flex flex-col gap-2 mt-4">
            <a href="{{route('home')}}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                Главная
            </a>
            <a href="{{route('subjects')}}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                Предметы
            </a>
        </nav>

        <div class="flex items-center gap-6 mt-auto pt-6 border-t border-base-200">
            <button id="btn-theme-mobile" class="cursor-pointer transition hover:scale-110 duration-200">
                <img src="{{ asset('../images/icons/moon.svg') }}" alt="Сменить тему" class="w-6 h-6 object-contain">
            </button>
            <button id="btn-accessible-mobile" class="cursor-pointer transition hover:scale-110 duration-200">
                <img src="{{ asset('../images/icons/eye.svg') }}" alt="Версия для слабовидящих" class="w-6 h-6 object-contain">
            </button>
            <a href="{{route('profile')}}" class="cursor-pointer transition hover:scale-110 duration-200">
                <img src="{{ asset('../images/icons/profile.svg') }}" alt="Профиль" class="w-6 h-6 object-contain">
            </a>
        </div>

    </div>

</header>
