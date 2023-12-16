<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>
    <div>
        <a href="/admin/users" class="text-blue-500 underline">Show All User List</a><br>
        <a href="/admin/users/create" class="text-blue-500 underline">Create New User</a>
    </div>
</x-app-layout>
