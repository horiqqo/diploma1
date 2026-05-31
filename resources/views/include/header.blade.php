<header class="w-full border border-base-200 bg-base-100">
    <div class="navbar px-6 min-h-[30px]">
        <div class="flex-1">
            <a href="{{ route('home') }}" class="inline-flex">
                <img src="{{ asset('../images/icons/logo2.svg') }}" alt="логотип" class="w-12 h-12 object-contain" loading="lazy">
            </a>
        </div>

        <div class="flex-none hidden md:flex">
            <ul class="menu menu-horizontal gap-2 text-lg">
                @auth
                    @if(auth()->user()->role->title === 'student')
                        <li>
                            <a href="{{ route('home') }}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subjects') }}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                                Предметы
                            </a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->role->title, ['admin', 'teacher']))
                        <li>
                            <a href="{{ route('dashboard') }}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                                Панель управления
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-subjects') }}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                                Предметы
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->role->title === 'admin')
                        <li>
                            <a href="{{ route('admin-users') }}" class="rounded-md transition-all duration-200 hover:bg-base-200 hover:scale-105 active:scale-95">
                                Пользователи
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>

        <div class="hidden md:flex flex-1 justify-end items-center gap-7">
            <button id="btn-theme" class="transition hover:scale-110 duration-200 cursor-pointer">
                <img data-icon="theme" src="{{ asset('../images/icons/moon.svg') }}" alt="Сменить тему" class="w-7 h-7 object-contain" loading="lazy">
            </button>

            <div class="relative flex items-center" id="accessible-wrapper">
                <button id="btn-accessible" class="transition hover:scale-110 duration-200 cursor-pointer">
                    <img data-icon="eye" src="{{ asset('../images/icons/eye.svg') }}" alt="Версия для слабовидящих" class="w-7 h-7 object-contain" loading="lazy">
                </button>
                <div id="accessible-panel" class="hidden absolute right-0 top-11 z-50 w-72 bg-base-100 border border-base-200 rounded-xl shadow-2xl p-4 flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-sm">Для слабовидящих</span>
                        <button id="accessible-reset" class="text-xs text-base-content/40 hover:text-error transition">Сбросить</button>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-base-content/40 uppercase tracking-widest">Размер шрифта</span>
                        <div class="grid grid-cols-4 gap-1">
                            <button data-size="0" class="accessible-size-btn btn btn-sm btn-ghost text-xs">Обычный</button>
                            <button data-size="1" class="accessible-size-btn btn btn-sm btn-ghost">A</button>
                            <button data-size="2" class="accessible-size-btn btn btn-sm btn-ghost">A+</button>
                            <button data-size="3" class="accessible-size-btn btn btn-sm btn-ghost font-bold">A++</button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-base-content/40 uppercase tracking-widest">Цветовая схема</span>
                        <div class="grid grid-cols-3 gap-2">
                            <button data-scheme="default" class="accessible-scheme-btn btn btn-sm border border-base-300 bg-white text-black hover:bg-white">Белый</button>
                            <button data-scheme="dark" class="accessible-scheme-btn btn btn-sm bg-black text-white border-0 hover:bg-neutral-900">Чёрный</button>
                            <button data-scheme="yellow" class="accessible-scheme-btn btn btn-sm bg-yellow-300 text-black border-0 hover:bg-yellow-400">Жёлтый</button>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                <a href="{{ auth()->user()->role->title === 'admin' ? route('dashboard') : route('profile') }}"
                   class="transition hover:scale-110 duration-200 cursor-pointer">
                    <img data-icon="profile" src="{{ asset('../images/icons/profile.svg') }}" alt="Профиль" class="w-7 h-7 object-contain" loading="lazy">
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="transition hover:scale-110 duration-200 cursor-pointer text-base-content/60 hover:text-error text-sm">
                        Выйти
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Войти</a>
            @endauth
        </div>

        <div class="flex md:hidden justify-end flex-1">
            <button id="btn-burger" class="cursor-pointer">
                <img data-icon="burger-menu" id="burger-icon" src="{{ asset('../images/icons/burger-menu.svg') }}" alt="мобильное меню" class="w-7 h-7" loading="lazy">
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden fixed inset-0 top-0 z-50 bg-base-100 flex flex-col px-6 py-6 gap-6 opacity-0 translate-x-full transition-all duration-300 ease-in-out">
        <div class="flex items-center justify-between">
            <a class="text-base">logo</a>
            <button id="btn-close" class="cursor-pointer">
                <img data-icon="close" src="{{ asset('../images/icons/close.svg') }}" alt="закрыть меню" class="w-7 h-7" loading="lazy">
            </button>
        </div>

        <nav class="flex flex-col gap-2 mt-4">
            @auth
                @if(auth()->user()->role->title === 'student')
                    <a href="{{ route('home') }}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                        Главная
                    </a>


                    <a href="{{ route('subjects') }}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                        Предметы
                    </a>

                @endif

                @if(in_array(auth()->user()->role->title, ['admin', 'teacher']))
                    <a href="{{ route('dashboard') }}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                        Панель управления
                    </a>
                    <a href="{{ route('admin-subjects') }}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                        Предметы
                    </a>
                @endif

                @if(auth()->user()->role->title === 'admin')
                    <a href="{{ route('admin-users') }}" class="text-xl py-4 border-b border-base-200 text-base-content/70 hover:text-primary transition">
                        Пользователи
                    </a>
                @endif
            @endauth
        </nav>

        <div class="flex flex-col gap-4 pt-4 border-base-200">
            <div class="flex flex-col gap-2">
                <span class="text-xs text-base-content/40 uppercase tracking-widest">Размер шрифта</span>
                <div class="grid grid-cols-4 gap-1">
                    <button data-size="0" class="accessible-size-btn btn btn-sm btn-ghost text-xs">Обычный</button>
                    <button data-size="1" class="accessible-size-btn btn btn-sm btn-ghost">A</button>
                    <button data-size="2" class="accessible-size-btn btn btn-sm btn-ghost">A+</button>
                    <button data-size="3" class="accessible-size-btn btn btn-sm btn-ghost font-bold">A++</button>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-xs text-base-content/40 uppercase tracking-widest">Цветовая схема</span>
                <div class="grid grid-cols-3 gap-2">
                    <button data-scheme="default" class="accessible-scheme-btn btn btn-sm border border-base-300 bg-white text-black hover:bg-white">Белый</button>
                    <button data-scheme="dark" class="accessible-scheme-btn btn btn-sm bg-black text-white border-0 hover:bg-neutral-900">Чёрный</button>
                    <button data-scheme="yellow" class="accessible-scheme-btn btn btn-sm bg-yellow-300 text-black border-0 hover:bg-yellow-400">Жёлтый</button>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6 mt-auto pt-6 border-t border-base-200">
            <button id="btn-theme-mobile" class="cursor-pointer transition hover:scale-110 duration-200">
                <img data-icon="theme" src="{{ asset('../images/icons/moon.svg') }}" alt="Сменить тему" class="w-6 h-6 object-contain" loading="lazy">
            </button>
            <button id="accessible-reset-mobile" class="cursor-pointer text-xs text-base-content/40 hover:text-error transition">
                Сбросить
            </button>
            @auth
                <a href="{{ auth()->user()->role->title === 'admin' ? route('dashboard') : route('profile') }}"
                   class="cursor-pointer transition hover:scale-110 duration-200">
                    <img data-icon="profile" src="{{ asset('../images/icons/profile.svg') }}" alt="Профиль" class="w-6 h-6 object-contain" loading="lazy">
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs text-base-content/40 hover:text-error transition cursor-pointer">
                        Выйти
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Войти</a>
            @endauth
        </div>
    </div>
</header>
