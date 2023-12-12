<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Checkout;
use App\Models\User;
use App\Models\Location;
use App\Models\ParcelAmount;
use App\Models\Statse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Location::truncate();
        ParcelAmount::truncate();
        Statse::truncate();
        Checkout::truncate();

        User::create([
            'name' => 'Sourav Das',
            'email' => 's@d.c',
            'password' => 'poiu0987'
        ]);
        User::create([
            'name' => 'John Doe',
            'email' => 'j@d.c',
            'password' => 'poiu0987'
        ]);
        User::create([
            'name' => 'Mark Miller',
            'email' => 'm@a.c',
            'password' => 'poiu0987'
        ]);
        User::factory(100)->create();

        Location::create([
            'location' => 'Raiganj',
        ]);
        Location::create([
            'location' => 'Maldah',
        ]);
        Location::create([
            'location' => 'Balurghat',
        ]);
        Location::create([
            'location' => 'Siliguri',
        ]);

        ParcelAmount::create([
            'from' => 'Raiganj',
            'to' => 'Balurghat',
            'amount' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Raiganj',
            'to' => 'Maldah',
            'amount' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Raiganj',
            'to' => 'Siliguri',
            'amount' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Raiganj',
            'amount' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Balurghat',
            'amount' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Siliguri',
            'amount' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Raiganj',
            'amount' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Maldah',
            'amount' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Siliguri',
            'amount' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Raiganj',
            'amount' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Maldah',
            'amount' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Balurghat',
            'amount' => '200'
        ]);

        Statse::create([
            'status' => 'Booked',
        ]);
        Statse::create([
            'status' => 'Shipped',
        ]);
        Statse::create([
            'status' => 'Out for delivery',
        ]);
        Statse::create([
            'status' => 'Delivered',
        ]);

        Checkout::factory(1000)->create();
    }
}
