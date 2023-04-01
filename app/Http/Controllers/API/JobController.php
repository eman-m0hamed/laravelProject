<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allJobs = Job::all();
        return $allJobs;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }

    public function addResults(Request $request){
        // $jobUser= new Job();
        $arr=json_decode($request->getContent(),true);
        $jobId=$arr['jobId'];
        $userId=$arr['userId'];
        $userAnswers=$arr['userAnswers'];
        $answerCount=0;
        $rightAnswerCount=0;
        // dd($userAnswers);
            foreach ($userAnswers as $arrQuestion => $answer) {
                $jobQuestions=Job:: with('question') ->get()->where('id',$jobId)->first();
                $questions=$jobQuestions->question;
                // dd($questions);
                $question = collect($questions)->where('question', $arrQuestion)->first();
                // dd($question['right_option']);
                // dd($answer);
                if($answer){
                    $answerCount++;
                }

                if($question['right_option']==$answer){
                    $rightAnswerCount ++;
                }

            }

            $user = User::find($userId);
            $job = Job::find($jobId);
            $job->users()->attach($user->id, [
                'answer_count' => $answerCount,
                'rightAnswer_count' => $rightAnswerCount,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return response()->json($user);
    }


}
