<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(request()->is('/'))
            <title>Courier</title>

        @elseif (request()->routeIs('book'))
            <title>Book</title>

        @elseif (request()->routeIs('payment'))
        <title>Payment</title>

        @elseif (request()->routeIs('checkout'))
            <title>Checkout</title>

        @elseif (request()->routeIs('order'))
        <title>Order</title>

        @elseif (request()->routeIs('orderdetails'))
            <title>Order details</title>

        @elseif (request()->routeIs('delivery'))
        <title>Delivery</title>

        @elseif (request()->routeIs('deliveryupdate'))
        <title>Delivery update</title>

        @elseif (request()->routeIs('status'))
        <title>Status</title>

        @elseif (request()->routeIs('statusupdate'))
        <title>Status update</title>

        @elseif (request()->routeIs('allorder'))
        <title>All orders</title>

        @elseif (request()->routeIs('allorderdetails'))
        <title>Order all details</title>

        @elseif (request()->routeIs('users'))
        <title>All users</title>

        @elseif (request()->routeIs('createusers'))
        <title>Create user</title>

        @elseif (request()->routeIs('updateuserdetails'))
        <title>Update user details</title>

        @else
            <title>Courier Management System</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
