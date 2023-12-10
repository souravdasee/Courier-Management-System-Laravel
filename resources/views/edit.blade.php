<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border text-gray-900 dark:text-gray-100">
                    <form action="/edit" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$checkouts['id']}}">
                        <p>User ID: {{ $checkouts['user_id'] }}</p>
                        <p>From: {{ $checkouts['from'] }}</p>
                        <p>To: {{ $checkouts['to'] }}</p>
                        <p>Weight: {{ $checkouts['weight'] }}</p>
                        <p>Amount: {{ $checkouts['parcel_amount'] }}</p>
                        <p>Payment method: {{ $checkouts['payment_method'] }}</p>
                        <p>Payment Status: {{ $checkouts['payment_status'] }}</p>
                        <p>Tracking ID: {{ $checkouts['tracking_id'] }}</p>
                        <p>Current Status: {{$checkouts['current_status']}}</p>
                        <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="current_status" autofocus required>
                            @foreach ($statses as $stats)
                                <option value="{{$stats['status']}}">{{$stats['status']}}</option>
                            @endforeach
                        </select>
                        <button class="border p-2 bg-blue-500" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
