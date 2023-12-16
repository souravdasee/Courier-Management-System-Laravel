<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/checkout">
                        @csrf
                        <div>
                            <p class="text-5xl">Parcel details</p>
                            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border p-2">
                                <div class="grid grid-cols-3">
                                    <div class="hidden">
                                        Booking person name:
                                        <select class="grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='name'>
                                            <option value="@foreach($users as $user){{ $user['name'] }}@endforeach">
                                                @foreach($users as $user){{ $user['name'] }}@endforeach
                                            </option>
                                        </select>
                                    </div>

                                    <div class="hidden">
                                        Booking person role:
                                        <select class="grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='name'>
                                            <option value="{{$roles}}">
                                                {{$roles}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        Parcel from:
                                        <p>{{ $couriers['from'] }}</p>
                                        <select class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='from'>
                                            <option value="{{ $couriers['from'] }}">
                                                {{ $couriers['from'] }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        Parcel to:
                                        <p>{{ $couriers['to'] }}</p>
                                        <select class=" hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='to'>
                                            <option value="{{ $couriers['to'] }}">
                                                {{ $couriers['to'] }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        Parcel weight: <p>{{ $couriers['weight'] }}</p>
                                        <input type="number" step="0.01" value="{{ $couriers['weight'] }}" class="hidden" name="weight">
                                    </div>
                                </div><br>

                                <div class="grid grid-cols-4">
                                    <div class="grid grid-cols-2 mr-12" >
                                        Paid amount: <p>@foreach ($parcelamounts as $parcelamount){{ $parcelamount['price'] + 10 }}@endforeach</p>
                                        <select class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='parcel_amounts'>
                                            <option value="@foreach ($parcelamounts as $parcelamount){{ $parcelamount['price'] + 10 }}@endforeach">
                                                @foreach ($parcelamounts as $parcelamount)
                                                    {{ $parcelamount['price'] + 10 }}
                                                @endforeach
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        Payment method: <p>{{ $paymentmethods['method'] }}</p>
                                        <select class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='payment_method'>
                                            <option value="{{ $paymentmethods['method'] }}">
                                                {{ $paymentmethods['method'] }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        payment status: <p>Paid</p>
                                        <select class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='payment_status'>
                                            <option value="Paid">
                                                Paid
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 mr-12">
                                        tracking id: <p><?= rand(1000000000, 9999999999) ?></p>
                                        <select class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name='tracking_id'>
                                            <option value="<?= rand(1111111111, 9999999999) ?>">
                                                <?= rand(1000000000, 9999999999) ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="ring p-2 m-2 rounded-md hover:bg-gray-700 hover:dark:bg-gray-300 hover:text-gray-100 hover:dark:text-gray-700">Ok</button>
                    </form>

                    <a href="/payment">
                        <button class="p-2 my-5 bg-white dark:bg-gray-800 text-green-900 dark:text-green-50 hover:text-black hover:bg-white ring rounded-xl">Back</button>
                    </a>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                      <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                          <a href="/dashboard" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-green-400 dark:bg-green-700 text-gray-900 dark:text-gray-50 ring-1 ring-inset ring-gray-300  focus:outline-offset-0">Step 1</a>
                          <a href="/payment" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-green-400 dark:bg-green-700 text-gray-900 dark:text-gray-50 ring-1 ring-inset ring-green-300  focus:outline-offset-0">Step 2</a>
                          <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-blue-400 dark:bg-blue-700 text-gray-900 dark:text-gray-50 ring-2 ring-inset ring-black  focus:outline-offset-0">Step 3</a>
                        </nav>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</x-app-layout>
