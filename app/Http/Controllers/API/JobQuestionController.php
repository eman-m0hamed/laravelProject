<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\JobQuestion;
use Illuminate\Http\Request;

class JobQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $value = $request->input('value');
        //  $SinglejobQustions=JobQuestion::where( "job_id",$value)->get();
        //  return response()->json($SinglejobQustions);
         //

         $allJobQuestions = JobQuestion::with('job')->get();
         return $allJobQuestions;

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
        // $jobQuestion->
        $jobQuestion= new JobQuestion();
        $jobQuestion->job_id= $request->formJob;
        $jobQuestion->question= $request->question;
        $jobQuestion->option1= $request->answer1;
        $jobQuestion->option2= $request->answer2;
        $jobQuestion->option3= $request->answer3;
        $jobQuestion->option4= $request->answer4;
        $jobQuestion->right_option= $request->rightAnswer;

        $result=$jobQuestion->save();

        if($result){
            return["result"=>"it success"];
        }else{
            return["result"=>"it failed"];

        }

    }

    /**
     * Display the specified resource.
     */
    public function show( $JobQuestion)
    {
            $SinglejobQustions = JobQuestion::where('job_id', $JobQuestion)-> get()->groupBy(
                function ($data){

                    return $data->job->title;
                }
            );

        return response()->json($SinglejobQustions);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobQuestion $jobQuestion)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $jobQuestion=JobQuestion::find($id);
        $jobQuestion->question= $request->question;
        $jobQuestion->option1= $request->answer1;
        $jobQuestion->option2= $request->answer2;
        $jobQuestion->option3= $request->answer3;
        $jobQuestion->option4= $request->answer4;
        $jobQuestion->right_option= $request->rightAnswer;

        $result=$jobQuestion->save();

        if($result){
            return["result"=>"update success"];
        }else{
            return["result"=>"update failed"];

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $jobQuestion=JobQuestion::find($id);

        $result=$jobQuestion->delete();

        if($result){
            return["result"=>"delete success"];
        }else{
            return["result"=>"delete failed"];

        }




    }



}
