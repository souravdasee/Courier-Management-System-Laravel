<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Amount;
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

        Amount::create([
            'weight' => 0.05,
            'distance' => 10,
            'amount' => 30,
            'time' => 1
        ]);
        Amount::create([
            'weight' => 0.05,
            'distance' => 100,
            'amount' => 50,
            'time' => 3
        ]);
        Amount::create([
            'weight' => 0.05,
            'distance' => 500,
            'amount' => 100,
            'time' => 5
        ]);
        Amount::create([
            'weight' => 0.05,
            'distance' => 1000,
            'amount' => 150,
            'time' => 7
        ]);
        Amount::create([
            'weight' => 0.05,
            'distance' => 2000,
            'amount' => 200,
            'time' => 10
        ]);
        Amount::create([
            'weight' => 0.2,
            'distance' => 10,
            'amount' => 50,
            'time' => 1
        ]);
        Amount::create([
            'weight' => 0.2,
            'distance' => 100,
            'amount' => 80,
            'time' => 3
        ]);
        Amount::create([
            'weight' => 0.2,
            'distance' => 500,
            'amount' => 140,
            'time' => 5
        ]);
        Amount::create([
            'weight' => 0.2,
            'distance' => 1000,
            'amount' => 190,
            'time' => 7
        ]);
        Amount::create([
            'weight' => 0.2,
            'distance' => 2000,
            'amount' => 260,
            'time' => 10
        ]);
        Amount::create([
            'weight' => 0.5,
            'distance' => 10,
            'amount' => 100,
            'time' => 1
        ]);
        Amount::create([
            'weight' => 0.5,
            'distance' => 100,
            'amount' => 150,
            'time' => 3
        ]);
        Amount::create([
            'weight' => 0.5,
            'distance' => 500,
            'amount' => 200,
            'time' => 5
        ]);
        Amount::create([
            'weight' => 0.5,
            'distance' => 1000,
            'amount' => 270,
            'time' => 7
        ]);
        Amount::create([
            'weight' => 0.5,
            'distance' => 2000,
            'amount' => 350,
            'time' => 10
        ]);
        Amount::create([
            'weight' => 0.51,
            'distance' => 10,
            'amount' => 150,
            'time' => 2
        ]);
        Amount::create([
            'weight' => 0.51,
            'distance' => 100,
            'amount' => 250,
            'time' => 3
        ]);
        Amount::create([
            'weight' => 0.51,
            'distance' => 500,
            'amount' => 300,
            'time' => 6
        ]);
        Amount::create([
            'weight' => 0.51,
            'distance' => 1000,
            'amount' => 350,
            'time' => 8
        ]);
        Amount::create([
            'weight' => 0.51,
            'distance' => 2000,
            'amount' => 450,
            'time' => 11
        ]);

        Checkout::factory(1000)->create();
    }
}
