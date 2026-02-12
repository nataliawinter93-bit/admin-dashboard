@props(['title' => 'Админ панель'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- ЛЕВОЕ МЕНЮ -->
        <aside class="w-64 bg-white shadow h-screen p-5">

            <h2 class="text-xl font-bold mb-6">Админ панель</h2>

            <ul class="space-y-3">

                @can('viewAny', App\Models\User::class)
                    <li><a href="{{ route('admin.users.index') }}" class="text-blue-600">Пользователи</a></li>
                @endcan

                @can('viewAny', App\Models\Role::class)
                    <li><a href="{{ route('admin.roles.index') }}" class="text-blue-600">Роли</a></li>
                @endcan

                @can('viewAny', App\Models\Permission::class)
                    <li><a href="{{ route('admin.permissions.index') }}" class="text-blue-600">Права</a></li>
                @endcan

                <!-- 🟦 ВОТ СЮДА Я ДОБАВИЛА ПУНКТ МЕНЮ "ЛОГИ" -->
                <li><a href="{{ route('admin.logs.index') }}" class="text-blue-600">Логи</a></li>

            </ul>

        </aside>

        <!-- ОСНОВНОЙ КОНТЕНТ -->
        <main class="flex-1 p-10">
            <x-flash />
            {{ $slot }}
        </main>

    </div>

</body>
</html>
