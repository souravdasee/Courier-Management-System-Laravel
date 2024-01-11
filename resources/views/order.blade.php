<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <form action="/order" method="GET" class="flex justify-center">
        <input type="text" name="search" placeholder="Find with tracking ID" class="bg-white dark:bg-gray-800 text-black dark:text-white absolute w-72 rounded-2xl text-center" value="{{ request('search') }}">
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2  text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tracking ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Current Location
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Details
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($checkouts as $checkout)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $checkout->created_at->diffForHumans() }}</td>
                                        <td class="px-6 py-4 flex justify-center">{{ $checkout->tracking_id }}</td>
                                        <td class="px-6 py-4">{{ $checkout->current_location }}</td>
                                        <td class="px-1 py-4 flex justify-center">
                                            <a href="{{"/order/".$checkout['id']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>

                                            <form method="POST" action="/order/{{ $checkout->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="ml-4 font-medium text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $checkouts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-flash />
</x-app-layout>
