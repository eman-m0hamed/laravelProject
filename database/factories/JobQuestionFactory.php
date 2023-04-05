<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobQuestion>
 */
class JobQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => Job::inRandomOrder()->first()->id,
            'question'=>fake()->slug(),
            'option1' =>fake()->realText(15,4),
            'option2'=>fake()->realText(15,3),
            'option3'=>fake()->realText(15,2),
            'option4'=>fake()->realText(15,1),
            'right_option' =>fake()->realText(15,4),
        ];
    }
}
