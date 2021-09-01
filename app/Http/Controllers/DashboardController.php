<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Joining;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // use Auth;

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('guest')->except('logout');
    }
    
    public function index(Request $request)
    {
        if(Auth::check() && Auth::user()->username){
            $sponsor = Member::join('profile', 'profile.id', '=', 'member.sponsor_id')
                        ->join('users', 'users.id', '=', 'profile.user_id')
                        ->get();
            if(count($sponsor) > 0){
                $context = [
                    'title' => 'Evoush::Dashboard | '.Auth::user()->username,
                    'brand' => 'evoush',
                    'user' => User::where('username', Auth::user()->username)->get(),
                    'sponsor' => $sponsor[0]
                ];
            }else{
                $context = [
                    'title' => 'Evoush::Dashboard | '.Auth::user()->username,
                    'brand' => 'evoush',
                    'user' => User::where('username', Auth::user()->username)->get(),
                ];
            }
            
            return view('dashboard.index', $context);
        }else{
            return redirect()->route('login')->with('status', 'Sesi anda telah habis, silahkan login ulang');
        }
    }

}
