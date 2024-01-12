<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('All Users') }}
                </h2>
            </div>
            <div class="relative">
                <a href="/users/create">
                    <button
                        class="absolute right-0 bg-blue-600 hover:bg-blue-700 text-white text-6xl px-4 py-1  rounded-full">
                        &plus;
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <form action="/users" method="GET" class="flex justify-center">
        <input type="email" name="search" placeholder="Find with email ID"
            class="bg-white dark:bg-gray-800 text-black dark:text-white absolute w-72 rounded-2xl text-center"
            value="{{ request('search') }}">
    </form>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        City
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->role }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->city }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ '/users/' . $user['id'] }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-flash />
</x-app-layout>
