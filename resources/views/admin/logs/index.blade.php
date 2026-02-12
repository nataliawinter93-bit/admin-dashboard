<x-admin-layout title="Activity Logs">

    <h1 class="text-2xl font-bold mb-6">Activity Logs</h1>

    {{-- Filters --}}
    <form method="GET" class="mb-6 grid grid-cols-3 gap-4 bg-white p-4 rounded shadow">

        {{-- User --}}
        <div>
            <label class="block text-sm font-medium mb-1">User</label>
            <select name="user_id" class="w-full border-gray-300 rounded">
                <option value="">All</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(request('user_id') == $user->id)>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Action --}}
        <div>
            <label class="block text-sm font-medium mb-1">Action</label>
            <select name="action" class="w-full border-gray-300 rounded">
                <option value="">All</option>
                <option value="create" @selected(request('action') == 'create')>Create</option>
                <option value="update" @selected(request('action') == 'update')>Update</option>
                <option value="delete" @selected(request('action') == 'delete')>Delete</option>
            </select>
        </div>

        {{-- Model --}}
        <div>
            <label class="block text-sm font-medium mb-1">Model</label>
            <select name="model" class="w-full border-gray-300 rounded">
                <option value="">All</option>
                @foreach ($models as $model)
                    <option value="{{ $model }}" @selected(request('model') == $model)>
                        {{ $model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-span-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Apply Filters
            </button>
        </div>
    </form>

    {{-- Logs Table --}}
    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">User</th>
                    <th class="p-3">Action</th>
                    <th class="p-3">Model</th>
                    <th class="p-3">Model ID</th>
                    <th class="p-3">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr class="border-b">
                        <td class="p-3">{{ $log->id }}</td>
                        <td class="p-3">{{ $log->user->name ?? 'System' }}</td>
                        <td class="p-3">{{ $log->action }}</td>
                        <td class="p-3">{{ $log->model }}</td>
                        <td class="p-3">{{ $log->model_id }}</td>
                        <td class="p-3">{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>

</x-admin-layout>
