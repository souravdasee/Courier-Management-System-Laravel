<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border">
                        <tr class="border">
                            <th class="border p-2">User ID</th>
                            <th class="border p-2">Tracking ID</th>
                            <th class="border p-2">Current Status</th>
                            <th class="border p-2">Operations</th>
                        </tr>
                        @foreach($checkouts as $checkout)
                            <tr class="border">
                                <td class="border p-2">{{ $checkout['user_id'] }}</td>
                                <td class="border p-2">{{ $checkout['tracking_id'] }}</td>
                                <td class="border p-2">{{ $checkout['current_status'] }}</td>
                                <td class="border p-2"><a href={{"/edit/".$checkout['id']}} class="bg-blue-500 p-2">Edit</a><a href="#" class="bg-red-500 p-2">Delete</a></td>
                            </tr>
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
