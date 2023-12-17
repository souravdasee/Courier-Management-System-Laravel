<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <form action="/users" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$users['id']}}">

                        <div class="p-2">
                            <label for="users_name">User name: </label>
                            <input class="w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600" type="text" name="name" id="users_name" value="{{ $users['name'] }}">
                        </div>

                        <div class="p-2">
                            <label for="role">User Role:</label>
                            <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role }}">
                                        {{ $role->role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-2">
                            <label for="users_email">User Email: </label>
                            <input class="w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="email" name="email" id="users_email" value="{{ $users['email'] }}">
                        </div>

                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Update</button>
                    </form>
                </div>
            </div>
            <div class="p-2">
                <a href="/users">
                    <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>