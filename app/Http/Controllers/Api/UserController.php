<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
	public $successStatus = 200;
    //
	public function login(){
		if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
			$user = Auth::user();
			$success['token'] =  $user->createToken('nApp')->accessToken;
			return response()->json(['success' => $success], $this->successStatus);
		}
		else{
			return response()->json(['error'=>'Unauthorised'], 401);
		}
	}

	public function logout(Request $request)
	{
		$logout = $request->user()->token()->revoke();
		if($logout){
			return response()->json([
				'message' => 'Successfully logged out'
			]);
		}
	}


	public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
