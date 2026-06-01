@extends('index')
@section('title', 'Политика обработки персональных данных')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-12 flex flex-col gap-8">

        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-bold">Политика обработки персональных данных</h1>
            <p class="text-base-content/50 text-sm">Последнее обновление: {{ date('d.m.Y') }}</p>
        </div>

        <div class="flex flex-col gap-6 text-base-content/80 leading-relaxed">

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">1. Общие положения</h2>
                <p>
                    Настоящая Политика конфиденциальности определяет порядок обработки и защиты персональных данных
                    пользователей веб-приложения системы дистанционного обучения Муниципального общеобразовательного
                    автономного учреждения средней общеобразовательной школы № 13 городского округа город Нефтекамск
                    Республики Башкортостан (далее — Оператор).
                </p>
                <p>
                    Оператор обязуется обеспечивать защиту персональных данных пользователей в соответствии с
                    Федеральным законом от 27.07.2006 № 152-ФЗ «О персональных данных».
                </p>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">2. Оператор персональных данных</h2>
                <div class="bg-base-200 rounded-xl p-5 flex flex-col gap-2 text-sm">
                    <p><span class="font-medium">Наименование:</span> Муниципальное общеобразовательное автономное учреждение средняя общеобразовательная школа № 13 городского округа город Нефтекамск Республики Башкортостан</p>
                    <p><span class="font-medium">Юридический адрес:</span> 452689, Республика Башкортостан, г. Нефтекамск, ул. Социалистическая, д. 74</p>
                    <p><span class="font-medium">Руководитель:</span> Холбан Любовь Александровна</p>
                </div>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">3. Персональные данные, которые мы собираем</h2>
                <p>В процессе использования системы дистанционного обучения Оператор собирает следующие персональные данные:</p>
                <ul class="list-disc list-inside flex flex-col gap-1 pl-2">
                    <li>Фамилия, имя, отчество</li>
                    <li>Адрес электронной почты</li>
                    <li>Дата рождения</li>
                    <li>Номер и буква класса</li>
                    <li>Результаты тестирований</li>
                </ul>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">4. Цели обработки персональных данных</h2>
                <p>Персональные данные обрабатываются в следующих целях:</p>
                <ul class="list-disc list-inside flex flex-col gap-1 pl-2">
                    <li>Обеспечение доступа к учебным материалам и тестированиям</li>
                    <li>Ведение учёта успеваемости обучающихся</li>
                    <li>Идентификация пользователя в системе</li>
                    <li>Связь с пользователем, в том числе направление уведомлений</li>
                </ul>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">5. Правовое основание обработки</h2>
                <p>
                    Обработка персональных данных осуществляется на основании согласия субъекта персональных данных,
                    выраженного при регистрации в системе, а также в соответствии с Федеральным законом
                    от 29.12.2012 № 273-ФЗ «Об образовании в Российской Федерации».
                </p>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">6. Хранение и защита данных</h2>
                <p>
                    Оператор принимает необходимые организационные и технические меры для защиты персональных данных
                    от неправомерного доступа, изменения, раскрытия или уничтожения. Персональные данные хранятся
                    на защищённых серверах и не передаются третьим лицам без согласия пользователя, за исключением
                    случаев, предусмотренных законодательством Российской Федерации.
                </p>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">7. Права пользователя</h2>
                <p>Пользователь имеет право:</p>
                <ul class="list-disc list-inside flex flex-col gap-1 pl-2">
                    <li>Получить информацию об обработке своих персональных данных</li>
                    <li>Требовать уточнения, блокирования или уничтожения персональных данных</li>
                    <li>Отозвать согласие на обработку персональных данных</li>
                    <li>Обжаловать действия Оператора в уполномоченный орган по защите прав субъектов персональных данных</li>
                </ul>
            </section>

            <section class="flex flex-col gap-3">
                <h2 class="text-xl font-semibold text-base-content">8. Контактная информация</h2>
                <p>
                    По вопросам обработки персональных данных вы можете обратиться по адресу:
                    <span class="font-medium">soch13-neft@mail.ru</span>
                </p>
            </section>

        </div>

        <div class="border-t border-base-200 pt-6">
            <a href="{{ route('register') }}" class="btn btn-outline btn-sm">← Вернуться к регистрации</a>
        </div>

    </div>

@endsection
