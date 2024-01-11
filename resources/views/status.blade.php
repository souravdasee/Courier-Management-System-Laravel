<x-app-layout>
    <x-slot name="header">
        <x-status-tabs />
    </x-slot>

    <form action="/status" method="GET" class="flex justify-center">
        <input type="text" name="search" placeholder="Find with tracking ID"
            class="bg-white dark:bg-gray-800 text-black dark:text-white absolute w-72 rounded-2xl text-center"
            value="{{ request('search') }}">
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tracking ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Current Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Current Location
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Destination
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Change status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkouts as $checkout)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $checkout->tracking_id }}</td>
                                        <td class="px-6 py-4">{{ $checkout->current_status }}</td>
                                        <td class="px-6 py-4">{{ $checkout->current_location }}</td>
                                        <td class="px-6 py-4">{{ $checkout->to }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ '/edit/' . $checkout['id'] }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $checkouts->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-flash />
</x-app-layout>
