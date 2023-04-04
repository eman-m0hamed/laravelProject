<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;

class UserController extends Controller
{
    // public function register(Request $request): JsonResponse
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'userName'=>'required',
    //         	'phone'=>'required',
    //             	'address'=>'required',
    //                 	'city'=>'required',
    //                     	'state'=>'required'
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());
    //     }

    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    //     $success['name'] =  $user->name;

    //     return $this->sendResponse($success, 'User register successfully.');
    // }
    // public function loginUser(Request $request): Response
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if($validator->fails()){

    //         return Response(['message' => $validator->errors()],401);
    //     }

    //     if(Auth::attempt($request->all())){

    //         $user = Auth::user();

    //         $success =  $user->createToken('MyApp')->plainTextToken;

    //         return Response(['token' => $success],200);
    //     }

    //     return Response(['message' => 'email or password wrong'],401);
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function userDetails(): Response
    // {
    //     if (Auth::check()) {

    //         $user = Auth::user();

    //         return Response(['data' => $user],200);
    //     }

    //     return Response(['data' => 'Unauthorized'],401);
    // }

    /**
     * Display the specified resource.
     */
    // public function logout(): Response
    // {
    //     $user = Auth::user();

    //     $user->currentAccessToken()->delete();

    //     return Response(['data' => 'User Logout successfully.'],200);
    // }
}
