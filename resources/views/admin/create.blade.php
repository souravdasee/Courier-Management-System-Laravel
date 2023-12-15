<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border text-gray-900 dark:text-gray-100">
                    <form action="/admin/users/create" method="POST">
                        @csrf

                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name" class="bg-white dark:bg-gray-900" placeholder="Name of the user" required>

                        <label for="roles_id">Role: </label>
                        <select name="roles_id" id="roles_id" class="bg-white dark:bg-gray-900" required>
                            @foreach ($roles_id as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->id }}
                                </option>
                            @endforeach
                        </select>

                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" class="bg-white dark:bg-gray-900" placeholder="User Email" required>

                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" class="bg-white dark:bg-gray-900" placeholder="Enter User Password" required>
                        <button type="submit" class="border p-2 bg-blue-500">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
