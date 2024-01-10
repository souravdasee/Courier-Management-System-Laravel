<?php

namespace Database\Seeders;

use App\Models\Checkout;
use App\Models\Distance;
use App\Models\Location;
use App\Models\User;
use App\Models\Role;
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
        Update::truncate();
        Checkout::truncate();
        Location::truncate();

        Location::factory(100)->create();

        User::create([
            'name' => 'Sourav Das',
            'email' => 's@d.c',
            'city' => 'Raiganj',
            'password' => 'poiu0987',
            'role' => 'Admin'
        ]);
        User::create([
            'name' => 'John Doe',
            'email' => 'j@d.c',
            'city' => 'Raiganj',
            'password' => 'poiu0987',
            'role' => 'Data Entry'
        ]);
        User::create([
            'name' => 'Mark Miller',
            'email' => 'm@a.c',
            'city' => 'Raiganj',
            'password' => 'poiu0987',
            'role' => 'Delivery Agent'
        ]);
        User::create([
            'name' => 'Gourab Das',
            'email' => 'g@d.c',
            'city' => 'Malda',
            'password' => 'poiu0987',
            'role' => 'Admin'
        ]);
        User::create([
            'name' => 'James Doe',
            'email' => 'ja@d.c',
            'city' => 'Malda',
            'password' => 'poiu0987',
            'role' => 'Data Entry'
        ]);
        User::create([
            'name' => 'Louis Miller',
            'email' => 'l@m.c',
            'city' => 'Malda',
            'password' => 'poiu0987',
            'role' => 'Delivery Agent'
        ]);
        User::create([
            'name' => 'Jane Doe',
            'email' => 'j@d.a',
            'city' => 'Malda',
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

        Distance::create([
            'weights_id' => 6,
            'min_distance' => 1,
            'max_distance' => 1000,
            'price' => 150
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 1001,
            'max_distance' => 10000,
            'price' => 190
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 10001,
            'max_distance' => 50000,
            'price' => 300
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 50001,
            'max_distance' => 100000,
            'price' => 400
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 100001,
            'max_distance' => 500000,
            'price' => 550
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 500001,
            'max_distance' => 1000000,
            'price' => 750
        ]);
        Distance::create([
            'weights_id' => 6,
            'min_distance' => 1000001,
            'max_distance' => null,
            'price' => 880
        ]);

        Checkout::factory(1000)->create();
    }
}
