<?php

namespace Database\Seeders;

use App\Models\JobQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobQuestion::factory()->count(50)->create();
    }
}
