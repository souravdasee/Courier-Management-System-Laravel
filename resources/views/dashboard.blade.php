<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book a Shipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/dashboard" method="POST">
                        @csrf

                        <div class="grid grid-cols-3">
                            <div >
                                <p>From<span class="text-red-500">*</span></p>
                                <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="from" autofocus required>
                                    @foreach ($locations as $location)
                                        <option value="{{$location['location']}}">{{$location['location']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <p>To<span class="text-red-500">*</span></p>
                                <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="to" required>
                                    @foreach ($locations as $location)
                                        <option value="{{$location['location']}}">{{$location['location']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <p>Weight<span class="text-red-500">*</span></p>
                                <input class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" type="number" name="weight" required>
                            </div>
                        </div>

                        <button type="submit" class="ring rounded-full p-2 my-5 bg-white dark:bg-gray-800 text-green-900 dark:text-green-50 hover:text-black hover:bg-white">Next</button>
                    </form>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                      <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                          <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-blue-400 dark:bg-blue-700 text-gray-900 dark:text-gray-50 ring-2 ring-inset ring-black focus:outline-offset-0">Step 1</span>
                          <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-50 ring-1 ring-inset ring-gray-300  focus:outline-offset-0">Step 2</span>
                          <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-50 ring-1 ring-inset ring-gray-300  focus:outline-offset-0">Step 3</span>
                        </nav>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
