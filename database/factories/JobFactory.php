<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'details' => fake()->slug(),
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'open_date' => fake()->dateTime(),
            'close_date' => fake()->dateTime(),

        ];
    }
}
