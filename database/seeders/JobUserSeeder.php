<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobQuestion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jobUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

$users = User::inRandomOrder()->take(5)->get();
        foreach ($users as $user) {
            $no_of_jobs = fake()->numberBetween(1, 5);
            $jobs = Job::inRandomOrder()->take($no_of_jobs)->get();
            foreach ($jobs as $job) {
                $question = JobQuestion::where('job_id',$job->id);
                $answer_count = fake()->numberBetween(1, $question->count());
                $rightAnswer_count = fake()->numberBetween(1, $answer_count);
                $job->jobsUser()->attach($user,
                ['answer_count'=>$answer_count,
                'rightAnswer_count'=>$rightAnswer_count,
                'status'=>'pending']);
            }
        }
    }
}
