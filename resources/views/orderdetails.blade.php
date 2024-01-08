<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    {{-- <style>
        .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 60rem;
        background-color: #f3f3f3;
        padding: 5rem 6rem;
        box-shadow: 0 4rem 6rem rgba(0, 0, 0, 0.3);
        z-index: 1000;
        transition: all 0.5s;
        }

        .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 100;
        transition: all 0.5s;
        }

        .modal__header {
        font-size: 3.25rem;
        margin-bottom: 4.5rem;
        line-height: 1.5;
        }

        .modal__form {
        margin: 0 3rem;
        display: grid;
        grid-template-columns: 1fr 2fr;
        align-items: center;
        gap: 2.5rem;
        }

        .modal__form label {
        font-size: 1.7rem;
        font-weight: 500;
        }

        .modal__form input {
        font-size: 1.7rem;
        padding: 1rem 1.5rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        }

        .modal__form button {
        grid-column: 1 / span 2;
        justify-self: center;
        margin-top: 1rem;
        }

        .btn--close-modal {
        font-family: inherit;
        color: inherit;
        position: absolute;
        top: 0.5rem;
        right: 2rem;
        font-size: 4rem;
        cursor: pointer;
        border: none;
        background: none;
        }

        .hidden {
        visibility: hidden;
        opacity: 0;
        }
    </style> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Sender Name: {{$checkouts->sender_name}}</p>
                    <p>Sender Contact Number: {{$checkouts->sender_number}}</p>
                    <p>Sender Adderss: {{$checkouts->sender_address}}</p>
                    <p>Recipient Name: {{$checkouts->recipient_name}}</p>
                    <p>Recipient Contact Number: {{$checkouts->recipient_number}}</p>
                    <p>Recipient Address: {{$checkouts->recipient_address}}</p>
                    <p>Parcel From: {{$checkouts->from}}</p>
                    <p>Parcel To: {{$checkouts->to}}</p>
                    <p>Distance: {{$checkouts->distance}}</p>
                    <p>Weight: {{$checkouts->weight}}</p>
                    <p>Parcel Amount: {{$checkouts->parcel_amounts}}</p>
                    <p>Payment Method: {{$checkouts->payment_method}}</p>
                    <p>Payment Status: {{$checkouts->payment_status}}</p>
                    <p>Current Status: {{$checkouts->current_status}}
                    <a href="#" class="text-blue-500 text-sm m-2 btn--show-modal">view</a>
                    </p>
                    <p>Current Location: {{$checkouts->current_location}}</p>
                    <p>Tracking ID: {{$checkouts->tracking_id}}</p>

                    <div class="modal hidden text-black">
                        <button class="btn--close-modal">&times;</button>


                        <p>Hello</p>


                    </div>
                    <div class="overlay hidden"></div>

                    <script>
                        const modal = document.querySelector('.modal');
                        const overlay = document.querySelector('.overlay');
                        const btnCloseModal = document.querySelector('.btn--close-modal');
                        const btnsOpenModal = document.querySelectorAll('.btn--show-modal');

                        const openModal = function (e) {
                        e.preventDefault();
                        modal.classList.remove('hidden');
                        overlay.classList.remove('hidden');
                        };

                        const closeModal = function () {
                        modal.classList.add('hidden');
                        overlay.classList.add('hidden');
                        };

                        btnsOpenModal.forEach(btn => btn.addEventListener('click', openModal));

                        btnCloseModal.addEventListener('click', closeModal);
                        overlay.addEventListener('click', closeModal);

                        document.addEventListener('keydown', function (e) {
                        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                            closeModal();
                        }
                        });
                    </script>

                    <div class="flex">Tracking ID QR Code: &nbsp;&nbsp;<div id="content">{!! DNS1D::getBarcodeHTML("$checkouts->tracking_id", 'C128', 2, 100, 'black', 15) !!}</div></div>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" onclick="downloadAsPNG()">Download QR Code</button>
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
                            link.download = '{{$checkouts->tracking_id}}_QR.png';
                            link.click();
                        });
                        }
                    </script>
                </div>
            </div>

            <div class="p-2">
                <a href="/order">
                    <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
