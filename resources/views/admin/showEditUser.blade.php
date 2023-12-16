<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <form action="/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$users['id']}}">

                        <div>
                            <label for="users_name">User name: </label>
                            <input class="bg-white dark:bg-gray-900" type="text" name="users_name" id="users_name" value="{{ $users['name'] }}">
                        </div>

                        <label for="role">User Role:</label>
                        <select name="role" id="role" class="bg-white dark:bg-gray-900" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role }}">
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>

                        <div>
                            <label for="users_name">User Email: </label>
                            <input class="bg-white dark:bg-gray-900" type="email" name="users_name" id="users_name" value="{{ $users['email'] }}">
                        </div>

                        <button type="submit" class="border p-2 bg-blue-500">Update</button>
                    </form>
                </div>
            </div>
            <a href="/admin/users">
                <button class="p-2 my-5 ring rounded-full bg-white dark:bg-gray-800 text-blue-500 hover:text-black hover:bg-white hover:dark:bg-gray-600">Back</button>
            </a>
        </div>
    </div>
</x-app-layout>
