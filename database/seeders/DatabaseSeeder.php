<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Amount;
use App\Models\Checkout;
use App\Models\Distance;
use App\Models\User;
use App\Models\Location;
use App\Models\ParcelAmount;
use App\Models\Role;
use App\Models\Statse;
use App\Models\Update;
use App\Models\Weight;
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

        Weight::create([
            'min_weight' => 1,
            'max_weight' => 50
        ]);
        Weight::create([
            'min_weight' => 51,
            'max_weight' => 100
        ]);
        Weight::create([
            'min_weight' => 101,
            'max_weight' => 200
        ]);
        Weight::create([
            'min_weight' => 201,
            'max_weight' => 500
        ]);
        Weight::create([
            'min_weight' => 501,
            'max_weight' => 1000
        ]);
        Weight::create([
            'min_weight' => 1001,
            'max_weight' => null
        ]);

        Distance::create([
            'weights_id' => 1,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 10
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 20
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 50
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 70
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 120
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 150
        ]);
        Distance::create([
            'weights_id' => 1,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 170
        ]);

        Distance::create([
            'weights_id' => 2,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 20
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 30
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 70
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 90
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 130
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 170
        ]);
        Distance::create([
            'weights_id' => 2,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 190
        ]);

        Distance::create([
            'weights_id' => 3,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 30
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 40
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 70
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 90
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 140
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 180
        ]);
        Distance::create([
            'weights_id' => 3,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 210
        ]);

        Distance::create([
            'weights_id' => 4,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 50
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 70
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 100
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 130
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 180
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 210
        ]);
        Distance::create([
            'weights_id' => 4,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 240
        ]);

        Distance::create([
            'weights_id' => 5,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 100
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 150
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 220
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 340
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 460
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 590
        ]);
        Distance::create([
            'weights_id' => 5,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 720
        ]);

        Checkout::factory(1000)->create();
    }
}
