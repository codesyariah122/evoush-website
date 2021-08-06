<?php
// login api 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
	public $successStatus = 200;
    //

    // for login oauth via token api

	// public function login(){
	// 	if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
	// 		$user = Auth::user();
	// 		$success['token'] =  $user->createToken('nApp')->accessToken;
	// 		return response()->json(['success' => $success], $this->successStatus);
	// 	}
	// 	else{
	// 		return response()->json(['error'=>'Unauthorised'], 401);
	// 	}
	// }

	// public function logout(Request $request)
	// {
	// 	$logout = $request->user()->token()->revoke();
	// 	if($logout){
	// 		return response()->json([
	// 			'message' => 'Successfully logged out'
	// 		]);
	// 	}
	// }


	// public function details()
 //    {
 //        $user = Auth::user();
 //        return response()->json(['success' => $user], $this->successStatus);
 //    }

	public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed!',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login Success!',
            'data'    => $user,
            'token'   => $user->createToken('authToken')->accessToken    
        ]);
    }
    
    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Success!',  
            ]);
        }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    
    
}
