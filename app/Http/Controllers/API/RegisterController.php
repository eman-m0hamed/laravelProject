<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'userName'=>'required|min:2',
            	'phone'=>'required|min:10',
                	'address'=>'required',
                    	'city'=>'required',
                        	'state'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        $token='';
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            $token= $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return response()->json([
                'status'=>true,
                'data'=>$user->only(['id','name']),
                'token'=>$token
            ]);

           // return $this->sendResponse($success, 'User login successfully.');
            // return response()->json($success, 'User login successfully.');
        }
        else{
            // return response()->json('Unauthorised.', ['error'=>'Unauthorised']);
           return $this->sendError('Unauthorised.', ['error'=>'!Fail,Email or password not matches']);
        }
    }
    // public function logout(Request $request): Response
    // {
    //     $user = $request->user();

    //     $user->currentAccessToken()->delete();

    //     // return Response(['data' => 'User Logout successfully.'],200);
    //     return $this->sendResponse($success, 'User logout successfully.');

    // }
function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status'=>true,'message'=>'log out successfully'],200);
}

}
