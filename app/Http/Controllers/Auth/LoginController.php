<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    // use AuthenticatesUsers{
    //     logout as performLogout;
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::DASHBOARD;

    // public function authenticate(Request $request)
    // {
    //     $username = $request->get('username');
    //     $password = $request->get('password');
    //     if (Auth::attempt(['username' => $username, 'password' => $password, 'status' => 'ACTIVE'])) {
    //         return redirect()->intended($this->redirectPath());
    //     }else{
    //         Auth::logout();
    //     }
    // }

    // public function authenticated(Request $request, $user)
    // {
    //     if (!$user->status === "INACTIVE") {
    //         Auth::logout();
    //         return redirect('/')->withError('Please activate your account before logging in.');
    //     }
    // }

    protected function validateLogin(Request $request)
    {
        $user = User::where($this->username(), '=', $request->input($this->username()))->first();
        if ($user && $user->status !== "ACTIVE") {
            throw ValidationException::withMessages([$this->username() => __('Akun Anda Belum Di aktivasi')]);
        }
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function redirectPath()
    {

        // $path = '/login';
        // $roles = json_decode(Auth::user()->roles);
        // switch($roles){
        //     case "ADMIN":
        //     return '/dashboard/evoush';
        //     break;
        //     case "MEMBER":
        //     return '/member/'.Auth::user()->username;
        //     break;
        //     default:
        //     return $path;
        //     break;
        // }

        if(in_array("ADMIN", json_decode(Auth::user()->roles)) && in_array("STAFF", json_decode(Auth::user()->roles))){
            return '/dashboard/evoush';
        }else if(in_array("MEMBER", json_decode(Auth::user()->roles))){
            return '/member/'.Auth::user()->username;

        }else if(in_array("CUSTOMER", json_decode(Auth::user()->roles))){
            return '/member/'.Auth::user()->username;
            // return redirect()->route('member.username', Auth::user()->username);
        }else if(in_array("FOLLOWER", json_decode(Auth::user()->roles))){
            return '/member/'.Auth::user()->username;
        }else if(in_array("AUTHOR", json_decode(Auth::user()->roles))){
            return '/dashboard/evoush';
        }else if(in_array("STAFF",  json_decode(Auth::user()->roles))){
            return '/dashboard/evoush';
        }
        // else {
        //     return '/member/'.Auth::user()->username;
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected function redirectTo()
    // {
    //     if (auth()->user()->role == ['ADMIN']) {
    //         return '/admin';
    //     }
    //     return '/';
    // }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    // public function logout(Request $request)
    // {
    //     $path1 = $request->segment(1);
    //     $path2 = $request->segment(2);
    //     $path3 = $request->segment(3);

    //     if(!empty($path2)){
    //         $redirect = $path1.'/'.$path2;
    //     }else if(!empty($path3)){
    //         $redirect = $path1.'/'.$path2.'/'.$path3;
    //     }else{
    //         $redirect = $path1;
    //     }

    //     $this->guard()->logout();

    //     $request->session()->flush();

    //     $request->session()->regenerate();

    //     return redirect($redirect)
    //         ->with('success', 'Anda telah logout !');
    // }

    // public function logout(Request $request)
    // {
    //    $this->performLogout($request);

    //    // return redirect()->route('your_route');

    //    return redirect()->back()->with('status', 'Anda telah keluar dari profile member');

    // }

}
