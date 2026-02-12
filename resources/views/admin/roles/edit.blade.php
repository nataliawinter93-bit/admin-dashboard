<x-admin-layout title="Edit User">

    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded"
                   value="{{ $user->name }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded"
                   value="{{ $user->email }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Password (optional)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Role</label>
            <select name="role_id" class="w-full border p-2 rounded">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update
        </button>
    </form>

</x-admin-layout>
