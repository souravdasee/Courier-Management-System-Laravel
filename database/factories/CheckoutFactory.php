<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Checkout>
 */
class CheckoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => fake()->numberBetween(1, 103),
            'users_name' => fake()->name(),
            'from' => fake()->unique()->city(),
            'to' => fake()->unique()->city(),
            'weight' => fake()->randomFloat(2, 1, 50000),
            'distance' => fake()->randomFloat(2, 1, 1000000),
            'parcel_amounts' => fake()->numberBetween(20, 700),
            'payment_method' => fake()->word(),
            'payment_status' => fake()->word(),
            'tracking_id' => fake()->numberBetween(1000000000, 9999999999),
            'current_status' => fake()->word(),
            'remarks' => fake()->sentence()
        ];
    }
}
