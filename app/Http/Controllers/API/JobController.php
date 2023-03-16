<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $jobs = Job::get();
            return response()->json([
                'success' => true,
                'data' =>   $jobs,
                'message' => 'ALL Jobs are retrieved'
                ], 200);
        }
        catch (\Throwable $error){
            return response()->json([
                'success' => false,
                'message' => 'server not available now please try again later'
                ], 503);
        }

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
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'open_date'=>'required|date',
            'close_date'=>'required|date',
        ]);

        ;
        try{
            $newJob=Job::create($request->all());
            return response()->json([
                'success' => true,
                'data' =>   $newJob,
                'message' => 'Job is Added Successfully'
                ], 200);
        }
        catch (\Throwable $error){
            return response()->json([
                'success' => false,
                'message' => 'server not available now please try again later'
                ], 503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        try{
            return response()->json([
                        'success' => true,
                        'data' => $job,
                        'message' => 'Job data is retrieved'
                        ], 200);
        }
          catch (\Throwable $error){
            return response()->json([
                'success' => false,
                'message' => 'server not available now please try again later'
                ], 503);
        }

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
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'state'=>'required',
            'open_date'=>'required',
            'close_date'=>'required',
        ]);
        try{
            $job->update($request->all());
            return response()->json([
                        'success' => true,
                        'data' => $job,
                        'message' => 'Job data is retrieved'
                        ], 200);
        }
          catch (\Throwable $error){
            return response()->json([
                'success' => false,
                'message' => 'server not available now please try again later'
                ], 503);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        try{
            $job->delete();
            return response()->json([
                        'success' => true,
                        'data' => $job,
                        'message' => 'Job is deleted Successfully'
                        ], 200);
        }
          catch (\Throwable $error){
            return response()->json([
                'success' => false,
                'message' => 'server not available now please try again later'
                ], 503);
        }
    }
}
