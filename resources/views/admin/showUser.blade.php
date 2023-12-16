<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <table class="border">
                        <tr class="border">
                            <th class="border p-2 underline">Name</th>
                            <th class="border p-2 underline">Role</th>
                            <th class="border p-2 underline">Email</th>
                            <th class="border p-2 underline">Edit</th>
                        </tr>
                        <div class="container">
                            @foreach($users as $user)
                            <tr class="border">
                                <td class="border p-1">{{ $user->name }}</td>
                                <td class="border p-1">{{ $user->role }}</td>
                                <td class="border p-1">{{ $user->email }}</td>
                                <td class="border p-1"><a href="{{"/admin/users/".$user['id']}}" class="bg-blue-500 p-1">Edit</a></td>
                            </tr>
                            @endforeach
                        </div>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            <a href="/admin">
                <button class="p-2 my-5 ring rounded-full bg-white dark:bg-gray-800 text-blue-500 hover:text-black hover:bg-white hover:dark:bg-gray-600">Back</button>
            </a>
        </div>
    </div>
</x-app-layout>
