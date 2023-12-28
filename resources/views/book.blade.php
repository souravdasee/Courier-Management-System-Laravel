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
                    <form action="/book" method="POST" id="booking">
                        @csrf

                        <div class="p-2">
                            <p>Sender's Name:<span class="text-red-500">*</span></p>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sender_name" placeholder="(E.g. John Doe)" value="{{ old('sender_name') }}" required>

                            @error('sender_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <p>Recipient's Name:<span class="text-red-500">*</span></p>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="recipient_name" value="{{ old('recipient_name') }}" placeholder="(E.g. Mark Miller)" required>

                            @error('recipient_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <p>Parcel Weight<span class="text-red-500">*</span>(in gm)</p>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="weight" value="{{ old('weight') }}" step="0.01" placeholder="max upto 50Kg & in 2 decimals" required>

                            @error('weight')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label for="sender_number">Sender's Phone Number:<span class="text-red-500">*</span></label>
                            <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sender_number" id="sender_number" placeholder="(E.g. 9876543210)" value="{{ old('sender_number') }}" required>

                            @error('sender_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label for="recipient_number">Recipient's Phone Number:<span class="text-red-500">*</span></label>
                            <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="recipient_number" value="{{ old('recipient_number') }}" id="recipient_number" placeholder="(E.g. 9876543210)" required>

                            @error('recipient_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <link
                            rel="stylesheet"
                            href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
                        />
                        <style>
                            @layer utilities {
                                .autocomplete-items > div {
                                    cursor: pointer;
                                    padding: 10px;
                                }
                            }
                        </style>

                        <style>
                            @layer utilities {
                                .autocomplete-items-hover > div:hover {
                                    background-color: #706c6c;
                                }
                            }
                        </style>

                        <div class="p-2">
                            <label for="startLocation">Sender's Location<span class="text-red-500">*</span></label>
                            <div class="">
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="from" value="{{ old('from') }}" id="startLocation" placeholder="(E.g. Farakka Barrage)" oninput="autoFill('start')" required>
                                <div class="absolute z-auto rounded bg-gray-700 max-h-40 overflow-y-auto w-full autocomplete-items autocomplete-items-hover" id="startAutocomplete"></div>
                            </div>
                        </div>

                        <div class="p-2">
                            <label for="endLocation">Recipient's Location<span class="text-red-500">*</span></label>
                            <div class="">
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="to" value="{{ old('to') }}" id="endLocation" placeholder="(E.g. kolkata)" oninput="autoFill('end')" required>
                                <div class="absolute z-auto rounded bg-gray-700 max-h-40 overflow-y-auto w-full autocomplete-items autocomplete-items-hover" id="endAutocomplete"></div>
                            </div>
                        </div>

                        <div class="p-2">
                            <p>Sender's Full Address<span class="text-red-500">*</span></p>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sender_address" required>{{ old('sender_address') }}</textarea>

                            @error('sender_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <p>Recipient's Full Address<span class="text-red-500">*</span></p>
                            <textarea type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="recipient_address" required>{{ old('recipient_address') }}</textarea>

                            @error('recipient_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="button" value="Get Directions" onclick="getDirections()" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" />

                        <div id="map" class="h-96 w-full rounded-2xl"></div>
                        <div class="p-2">
                            <label for="distance">Distance (in km)</label>
                            <div><textarea id="distance" name="distance" class="bg-gray-800 text-gray-300 w-full h-10 p-2 border-hidden" readonly></textarea>{{ old('distance') }}</div>
                        </div>

                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Next</button>
                    </form>

                    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                    <script>
                        let map;
                        let routeLayer;

                        function initMap() {
                            if (!map) {
                            map = L.map('map').setView([0, 0], 2);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution:
                                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>',
                            }).addTo(map);
                            }
                        }

                        function autoFill(type) {
                            const input = document.getElementById(`${type}Location`);
                            const autocompleteContainer = document.getElementById(
                            `${type}Autocomplete`
                            );
                            const query = input.value;

                            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                            .then(response => response.json())
                            .then(data => {
                                autocompleteContainer.innerHTML = '';
                                if (data.length > 0) {
                                data.forEach(item => {
                                    const suggestion = document.createElement('div');
                                    suggestion.innerHTML = item.display_name;
                                    suggestion.addEventListener('click', () => {
                                    input.value = item.display_name;
                                    autocompleteContainer.innerHTML = '';
                                    });
                                    autocompleteContainer.appendChild(suggestion);
                                });
                                }
                            })
                            .catch(error => {
                                console.error('Autofill error:', error);
                            });
                        }

                        function getDirections() {
                            const startInput = document.getElementById('startLocation');
                            const endInput = document.getElementById('endLocation');

                            const startLocation = encodeURIComponent(startInput.value);
                            const endLocation = encodeURIComponent(endInput.value);

                            fetch(
                            `https://nominatim.openstreetmap.org/search?format=json&q=${startLocation}`
                            )
                            .then(response => {
                                if (!response.ok) {
                                throw new Error('Start location not found.');
                                }
                                return response.json();
                            })
                            .then(startData => {
                                const startCountryCode = startData[0].display_name
                                .split(',')
                                .slice(-1)[0]
                                .trim();

                                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${endLocation}`)
                                .then(response => {
                                    if (!response.ok) {
                                    throw new Error('End location not found.');
                                    }
                                    return response.json();
                                })
                                .then(endData => {
                                    const endCountryCode = endData[0].display_name
                                    .split(',')
                                    .slice(-1)[0]
                                    .trim();

                                    if (startCountryCode !== endCountryCode) {
                                    document.getElementById('distance').innerHTML =
                                        'Sorry, it is outside the country.';
                                    return;
                                    }

                                    const startLat = startData[0].lat;
                                    const startLon = startData[0].lon;
                                    const endLat = endData[0].lat;
                                    const endLon = endData[0].lon;

                                    const routeURL = `https://router.project-osrm.org/route/v1/driving/${startLon},${startLat};${endLon},${endLat}?geometries=geojson`;

                                    fetch(routeURL)
                                    .then(response => {
                                        if (!response.ok) {
                                        throw new Error('Directions request failed.');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if (
                                        data.code !== 'Ok' ||
                                        !data.routes ||
                                        data.routes.length === 0
                                        ) {
                                        throw new Error('No routes found.');
                                        }

                                        const newRouteLayer = L.geoJSON(data.routes[0].geometry);

                                        if (routeLayer) {
                                        map.removeLayer(routeLayer);
                                        }

                                        routeLayer = newRouteLayer;
                                        routeLayer.addTo(map);
                                        map.fitBounds(routeLayer.getBounds());

                                        const distance = data.routes[0].distance / 1000;
                                        document.getElementById(
                                        'distance'
                                        ).innerHTML = distance;
                                    })
                                    .catch(error => {
                                        console.error('Error fetching directions:', error);
                                    });
                                })
                                .catch(error => {
                                    console.error('Error fetching end location:', error);
                                });
                            })
                            .catch(error => {
                                console.error('Error fetching start location:', error);
                            });
                        }

                        window.onload = initMap;
                    </script>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                          <li class="inline-flex items-center">
                            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-blue-500 hover:text-red-600 dark:hover:text-yellow-500">
                              <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                              </svg>
                              Book
                            </a>
                          </li>
                          <li>
                            <div class="flex items-center">
                              <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg>
                              <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400">Payment</span>
                            </div>
                          </li>
                          <li aria-current="page">
                            <div class="flex items-center">
                              <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg>
                              <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Checkout</span>
                            </div>
                          </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
