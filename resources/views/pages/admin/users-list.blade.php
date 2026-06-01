    @extends('index')
    @section('title', 'Список пользователей')
    @section('content')

        <div class="max-w-5xl mx-auto px-6 py-10 flex flex-col gap-6">

            <nav class="flex items-center gap-2 text-sm text-base-content/50">
                {{ Breadcrumbs::render('admin-users') }}
            </nav>




            <x-filters :action="route('admin-users')">
                <select name="role_id" class="select select-bordered font-normal">
                    <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все роли</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->title }}
                        </option>
                    @endforeach
                </select>

                <select name="class_number" class="select select-bordered font-normal">
                    <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все классы</option>
                    @for($i = 1; $i <= 11; $i++)
                        <option value="{{ $i }}" {{ request('class_number') == $i ? 'selected' : '' }}>{{ $i }} класс</option>
                    @endfor
                </select>

                <select name="sort" class="select select-bordered font-normal">
                    <option value="" disabled {{ request('sort') ? '' : 'selected' }}>По названию</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>А → Я</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Я → А</option>
                </select>
            </x-filters>

            <div class="overflow-x-auto mt-6">
                <table class="table table-fixed w-full border border-base-200">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Класс</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr class="hover">
                            <td>{{ $user->id }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>

                                <form method="POST"
                                      action="{{ route('admin-users-role-update', $user->id) }}"
                                      class="flex items-center gap-2">

                                    @csrf
                                    @method('PATCH')

                                    <select name="role_id"
                                            class="select select-bordered select-sm">

                                        @foreach($roles as $role)

                                            <option value="{{ $role->id }}"
                                                @selected($user->role_id == $role->id)>

                                                {{ $role->title }}

                                            </option>

                                        @endforeach

                                    </select>

                                    <button class="btn btn-primary btn-sm">
                                        OK
                                    </button>

                                </form>

                            </td>

                            <td>
                                {{ $user->class_number }}{{ $user->class_letter }}
                            </td>

                            <td>
                                <a href="{{ route('admin-users-edit', $user->id) }}"
                                   class="btn btn-sm btn-primary font-normal">
                                    Редактировать
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin-users-delete', $user->id) }}" id="delete-user-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-error btn-outline font-normal"
                                            onclick="confirmDelete('delete-user-{{ $user->id }}', 'Вы уверены, что хотите удалить пользователя {{ $user->name }}?')">
                                        Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="mt-4 px-4">
                    {{ $users->links() }}
                </div>
            </div>

        </div>

    @endsection
