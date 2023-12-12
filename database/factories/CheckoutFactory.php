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
            'user_id' => fake()->numberBetween(1, 103),
            'user_name' => fake()->name(),
            'from' => fake()->unique()->city(),
            'to' => fake()->unique()->city(),
            'weight' => fake()->numberBetween(1, 100),
            'parcel_amount' => fake()->numberBetween(110, 210),
            'payment_method' => fake()->word(),
            'payment_status' => fake()->word(),
            'tracking_id' => fake()->numberBetween(100000, 999999),
            'current_status' => fake()->word(),
            'remarks' => fake()->sentence()
        ];
    }
}
