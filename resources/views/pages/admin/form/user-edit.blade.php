@extends('index')

@section('title', 'Редактирование пользователя')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <form method="POST"
              action="{{ route('admin-users-update', $user->id) }}"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">
                Редактирование пользователя
            </h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">ФИО</label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="input input-bordered w-full">

                @error('name')
                <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Email</label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="input input-bordered w-full">

                @error('email')
                <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Роль</label>

                <select name="role_id"
                        class="select select-bordered w-full">

                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                            @selected($role->id == $user->role_id)>
                            {{ $role->title }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Класс</label>

                    <select name="class_number"
                            class="select select-bordered w-full">

                        <option value="">Не выбран</option>

                        @for($i = 1; $i <= 11; $i++)
                            <option value="{{ $i }}"
                                @selected($i == $user->class_number)>
                                {{ $i }}
                            </option>
                        @endfor

                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Буква</label>

                    <select name="class_letter"
                            class="select select-bordered w-full">

                        <option value="">Не выбрана</option>

                        @foreach(['А', 'Б', 'В', 'Г'] as $letter)
                            <option value="{{ $letter }}"
                                @selected($letter == $user->class_letter)>
                                {{ $letter }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <button class="btn btn-primary w-full">
                Сохранить изменения
            </button>

        </form>

    </div>

@endsection
