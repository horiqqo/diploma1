<footer class="border-t border-base-300">
    <div class="max-w-[1080px] mx-auto px-6 py-10">

        <div class="hidden md:flex items-start justify-between gap-10">
            <div class="flex items-center gap-3 max-w-[200px]">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img src="{{ asset('../images/icons/logo2.svg') }}" alt="логотип" class="w-16 h-16 object-contain" loading="lazy">
                    <span class="text-sm text-base-content/70">Система дистанционного обучения МОАУ СОШ №13</span>
                </a>
            </div>
            <div class="flex flex-col gap-2">
                <span class="font-medium">Навигация</span>
                <a href="{{ route('home') }}" class="text-base-content/70 hover:text-primary transition">Главная</a>
                <a href="{{ route('subjects') }}" class="text-base-content/70 hover:text-primary transition">Предметы</a>
            </div>
            <div class="flex flex-col gap-2">
                <span class="font-medium">Контакты</span>
                <span class="text-base-content/70">Телефон: 8 (34783) 5-14-37</span>
                <span class="text-base-content/70">Почта: soch13-neft@mail.ru</span>
            </div>
            <div class="flex flex-col gap-2">
                <span class="font-medium">Документы</span>
                <a href="{{ route('privacy') }}" class="text-base-content/70 hover:text-primary transition">Политика обработки персональных данных</a>
            </div>
        </div>

        <div class="flex md:hidden flex-col gap-6">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img src="{{ asset('../images/icons/logo2.svg') }}" alt="логотип" class="w-16 h-16 object-contain" loading="lazy">
                    <span class="text-sm text-base-content/70">Система дистанционного обучения МОАУ СОШ №13</span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <span class="font-medium">Навигация</span>
                    <a href="{{ route('home') }}" class="text-base-content/70 hover:text-primary transition">Главная</a>
                    <a href="{{ route('subjects') }}" class="text-base-content/70 hover:text-primary transition">Предметы</a>
                </div>
                <div class="flex flex-col gap-2">
                    <span class="font-medium">Контакты</span>
                    <span class="text-base-content/70 text-sm">Телефон: 8 (34783) 5-14-37</span>
                    <span class="text-base-content/70 text-sm">Почта: soch13-neft@mail.ru</span>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <span class="font-medium">Документы</span>
                <a href="{{ route('privacy') }}" class="text-base-content/70 hover:text-primary transition text-sm">Политика обработки персональных данных</a>
            </div>
        </div>

    </div>
</footer>
