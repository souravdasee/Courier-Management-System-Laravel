<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Checkout;
use App\Models\User;
use App\Models\Location;
use App\Models\ParcelAmount;
use App\Models\Role;
use App\Models\Statse;
use App\Models\Update;
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
        Update::truncate();
        Checkout::truncate();

        User::create([
            'name' => 'Sourav Das',
            'email' => 's@d.c',
            'password' => 'poiu0987',
            'role' => 'Admin'
        ]);
        User::create([
            'name' => 'John Doe',
            'email' => 'j@d.c',
            'password' => 'poiu0987',
            'role' => 'Data Entry'
        ]);
        User::create([
            'name' => 'Mark Miller',
            'email' => 'm@a.c',
            'password' => 'poiu0987',
            'role' => 'Delivery Agent'
        ]);
        User::create([
            'name' => 'Jane Doe',
            'email' => 'j@d.a',
            'password' => 'poiu0987',
            'role' => 'User'
        ]);
        User::factory(100)->create();

        Role::create([
            'role' => 'Admin',
        ]);
        Role::create([
            'role' => 'Data Entry',
        ]);
        Role::create([
            'role' => 'User',
        ]);
        Role::create([
            'role' => 'Delivery Agent',
        ]);

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
            'price' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Raiganj',
            'to' => 'Maldah',
            'price' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Raiganj',
            'to' => 'Siliguri',
            'price' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Raiganj',
            'price' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Balurghat',
            'price' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Maldah',
            'to' => 'Siliguri',
            'price' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Raiganj',
            'price' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Maldah',
            'price' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Balurghat',
            'to' => 'Siliguri',
            'price' => '200'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Raiganj',
            'price' => '100'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Maldah',
            'price' => '150'
        ]);
        ParcelAmount::create([
            'from' => 'Siliguri',
            'to' => 'Balurghat',
            'price' => '200'
        ]);

        Update::create([
            'status' => 'Booked',
        ]);
        Update::create([
            'status' => 'Shipped',
        ]);
        Update::create([
            'status' => 'Out for delivery',
        ]);
        Update::create([
            'status' => 'Delivered',
        ]);

        Checkout::factory(1000)->create();
    }
}
