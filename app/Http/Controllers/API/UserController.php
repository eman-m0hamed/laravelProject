<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = User::paginate(5);
        return response()->json(['data' => $candidates]);
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
            "name" => "required|string",
            "password" => "required|string",
            "email" => "required|string",
            "userName" => "required|string",
            "phone" => "required|string",
            "address" => "required|string",
            "city" => "required|string",
            "state" => "required|string"
        ]);

        try {
            //code...
            $candidate = User::create($request->all());
            return response()->json(['data' => $candidate], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "Server not available now try latter"], 503);
        }
        //dd($candidate);

    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $candidate = User::find($id);
    //     if (is_null($candidate)) {
    //         return response()->json(['message' => "User Not Found"]);
    //     }
    //     return response()->json(['data' => $candidate]);
    // }
    public function show(User $user)
    {
        // Try To Handle Error if user Not Found
        // if (is_null($user)) {
        //     return response()->json(['message' => "User Not Found"]);
        // }
        try {
            //code...
            return response()->json(['data' => $user]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "User Not Found check your data"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "sometimes|string",
            "password" => "sometimes|string",
            "email" => "sometimes|string",
            "userName" => "sometimes|string",
            "phone" => "sometimes|string",
            "address" => "sometimes|string",
            "city" => "sometimes|string",
            "state" => "sometimes|string"
        ]);

        try {
            //code...
            $user->update($request->all());
            return response()->json(['data' => $user, "message" => "Data updated Successfully"], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "Server not available now try latter"], 503);
        }
    }
    public function searchJob(Request $request)
    {
        try {
            //code...
            $jobs = Job::where('title', 'like', '%' . $request->title . '%')->get();
            return response()->json(["data" => $jobs, "Success" => "True"]);
        } catch (\Throwable $th) {
            //throw $th;
            if (is_null($jobs)) {
                return response()->json(["message" => "Job not found check your data", "Success" => "False"]);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            //code...
            $user->delete();
            return response()->json(['data' => $user, 'message' => "User Deleted Successfully"]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "User Not Found check your data"]);
        }
    }
}
