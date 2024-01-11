<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Sender Name: {{ $checkouts->sender_name }}</p>
                    <p>Sender Contact Number: {{ $checkouts->sender_number }}</p>
                    <p>Sender Adderss: {{ $checkouts->sender_address }}</p>
                    <p>Recipient Name: {{ $checkouts->recipient_name }}</p>
                    <p>Recipient Contact Number: {{ $checkouts->recipient_number }}</p>
                    <p>Recipient Address: {{ $checkouts->recipient_address }}</p>
                    <p>Parcel From: {{ $checkouts->from }}</p>
                    <p>Parcel To: {{ $checkouts->to }}</p>
                    <p>Distance: {{ $checkouts->distance }}</p>
                    <p>Weight: {{ $checkouts->weight }}</p>
                    <p>Parcel Amount: {{ $checkouts->parcel_amounts }}</p>
                    <p>Payment Method: {{ $checkouts->payment_method }}</p>
                    <p>Payment Status: {{ $checkouts->payment_status }}</p>
                    <p>Tracking ID: {{ $checkouts->tracking_id }}</p>
                    <div>Current Status: {{ $checkouts->current_status }} at {{ $checkouts->current_location }}
                        <a href="#" class="text-blue-500 text-sm ml-2 btn--show-modal">view details</a>
                        <div class="modal hidden bg-gray-300 dark:bg-gray-900 w-auto rounded-2xl">
                            <div class="m-2 p-2">
                                <ol class="relative border-s border-black dark:border-white">
                                    @foreach (json_decode($checkouts->timeline_data, true) as $data)
                                        <li class="ms-4 mb-2">
                                            <div
                                                class="absolute w-3 h-3 bg-red-500 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900">
                                            </div>
                                            <time
                                                class="mb-1 text-red-500 text-sm font-normal leading-none">{{ carbon\carbon::parse($data['time'])->format('d-M-Y h:i:s') }}</time>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $data['status'] }}</h3>
                                            <p class="text-base font-normal">
                                            <p class="text-blue-500">Location: {{ $data['location'] }}</p>
                                            </p>
                                        </li>
                                    @endforeach
                                </ol>

                                <button
                                    class="mt-4 btn--close-modal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">OK</button>
                            </div>
                        </div>
                        <div class="overlay hidden"></div>
                    </div>

                    <script>
                        const modal = document.querySelector('.modal');
                        const overlay = document.querySelector('.overlay');
                        const btnCloseModal = document.querySelector('.btn--close-modal');
                        const btnsOpenModal = document.querySelectorAll('.btn--show-modal');

                        const openModal = function(e) {
                            e.preventDefault();
                            modal.classList.remove('hidden');
                            overlay.classList.remove('hidden');
                        };

                        const closeModal = function() {
                            modal.classList.add('hidden');
                            overlay.classList.add('hidden');
                        };

                        btnsOpenModal.forEach(btn => btn.addEventListener('click', openModal));

                        btnCloseModal.addEventListener('click', closeModal);
                        overlay.addEventListener('click', closeModal);

                        document.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                                closeModal();
                            }
                        });
                    </script>

                    <div class="flex">Tracking ID QR Code: &nbsp;&nbsp;<div id="content">{!! DNS1D::getBarcodeHTML("$checkouts->tracking_id", 'C128', 2, 100, 'black', 15) !!}
                        </div>
                    </div>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                        onclick="downloadAsPNG()">Download QR Code</button>
                    <script>
                        function downloadAsPNG() {
                            const content = document.getElementById('content');
                            html2canvas(content, {
                                x: -20,
                                y: -20,
                                width: content.offsetWidth + 40,
                                height: content.offsetHeight + 40,
                                scale: window.devicePixelRatio * 2
                            }).then(canvas => {
                                const imgData = canvas.toDataURL('image/png');
                                const link = document.createElement('a');
                                link.href = imgData;
                                link.download = '{{ $checkouts->tracking_id }}_QR.png';
                                link.click();
                            });
                        }
                    </script>
                </div>
            </div>

            <div class="p-2">
                <a href="/order">
                    <button
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
