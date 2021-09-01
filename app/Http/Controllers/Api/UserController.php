<?php
// login api
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
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

        // return response()->json([
        //     'data' => $user
        // ]);
        if($user === null){
            return response()->json([
                'message' => 'Username yang anda gunakan belum terdaftar silahkan, lakukan join ke sponsor pilihan anda yang ada di halaman leader'
            ]);
        }

        $user_id = $user->id;

        if($user->status === "INACTIVE"){
           $member = Member::where('user_id', $user_id)->first();

           $sponsor = User::where('id', $member->sponsor_id)->first();
            return response()->json([
                'success' => false,
                'message' => 'Status member anda belum di aktivasi oleh pihak sponsor, coba hubungi pihak sponsor anda.',
                'data' => $user,
                'sponsor' => $sponsor
            ]);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                'success' => false,
                'message' => 'Login Failed! / Username atau password yang anda masukan tidak sesuai',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login Success!',
            'data'    => $user,
            'token'   => $user->createToken('authToken')->accessToken
        ], 201);
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
