<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Joining;
use Auth;

class JoinMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(Auth::check() && Auth::user()->id){
            $filterKeyword = $request->get('keyword');
            $status = $request->get('status');
            $id = Auth::user()->id;
            
            $members = User::join('member', 'member.user_id', '=', 'users.id')
                        ->join('profile', 'profile.user_id', '=', 'users.id')
                        ->where('member.sponsor_id', '=', $id)
                        ->paginate(10);

            $sponsors = Member::join('profile', 'profile.id', '=', 'member.sponsor_id')
                        ->join('users', 'users.id', '=', 'profile.user_id')
                        ->where('member.sponsor_id', '=', $id)
                        ->get();

            $context = [
                'title' => 'Lists Member',
                'brand' => 'evoush',
                'user' => User::where('name', Auth::user()->name)->paginate(10),
                // 'users' => User::where('name', Auth::user()->name)->paginate(10)
                'members' => $members,
                'sponsor' => $sponsors
            ];
        
            return view('dashboard.memberjoin.index', $context);
        }else{
            return redirect()->route('login')->with('status', 'Sesi anda telah habis, silahkan login ulang');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $context = [
            'title' => 'Create New Member',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->get()[0]
        ];
        return view('dashboard.memberjoin.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $validation = \Validator::make($request->all(),[
           "name" => "required|min:5|max:100|unique:users",
           "email" => "required|email|unique:users",
           "password" => "required",
           "password_confirmation" => "required|same:password"
       ])->validate();

        $new_user = new User;
        $new_user->name = strtolower($request->get('name'));
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->username = trim(preg_replace('/\s+/', '', $new_user->name));

        // echo $new_user->username;
        
        $new_user->roles = json_encode($request->get('roles'));
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        if($request->file('avatar')){
          $file = $request->file('avatar')->store('avatars', 'public');
          $new_user->avatar = $file;
        }
        $new_user->status = $request->get('status');
        $new_user->save();
        
        $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');
        $prov = file_get_contents($url);
        $data = json_decode($prov, 1);
        $provinsi = $data['nama'];
        $new_userid = $new_user->id;
        $new_username = $new_user->username;

        $new_profile = new Profile;
        $new_profile->user_id = $new_userid;
        $new_profile->quotes = $request->get('quotes');
        $new_profile->cover = null;
        $new_profile->about = $request->get('about');
        $new_profile->instagram = null;
        $new_profile->facebook = null;
        $new_profile->youtube = null;
        $new_profile->province = $provinsi;
        $new_profile->city = $request->get('city');
        $new_profile->parallax = null;
        $new_profile->save();

        $new_member = new Member;
        // $new_member->username = $new_username;
        $new_member->user_id = $new_userid;
        $new_member->sponsor_id = $request->get('sponsor_id');
        $new_member->save();

        $new_join = new Joining;
        // $new_join->username = $new_username;
        $new_join->member_id = $new_member->id;
        $new_join->user_id = $new_member->user_id;
        $new_join->save();
        
        return redirect()->route('member.create')->with('status', 'User : '.$new_user->username.' successfully created. Lanjutkan aktivasi member '.$new_user->username.' di table member lists.');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $context = [
            'title' => 'Member Edit',
            'brand' => 'evoush',
            // 'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'user' => User::findOrFail($id),
            'member' => User::join('profile', 'users.id', '=', 'profile.user_id')->findOrFail($id)
        ];

        return view('dashboard.memberjoin.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function activated(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->get('status');
        $user->save();
        return redirect()->route('member.index')->with('status', 'Member '.$user->username.' succesfully Activated');
    }

    public function update(Request $request, $id)
    {
        //
        // echo "<pre>";
        // var_dump($request->all()); 
        // echo json_encode($request->get('roles'));
        // echo "</pre>";
        \Validator::make($request->all(), [
           "name" => "required|min:5|max:100",
           // "email" => "required|email|unique:users",
           "username" => "required",
           "address" => "required|min:20|max:200"
       ])->validate();

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }
        $user->status = $request->get('status');
        $user->save();

        $profile = Profile::findOrFail($id);
        $profile->province = $request->get('province');
        $profile->city = $request->get('city');
        $profile->save();

        return redirect()->route('member.edit', [$user->id])->with('status', 'Member '.$user->username.' succesfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deletedAll($user_id)
    {
        // $join = Joining::where('user_id', '=', $user_id)->delete();
        // $user = User::findOrFail($user_id);
        $profile = User::findOrFail($user_id)->delete();
        return redirect()->back()->with('status', 'Member successfully deleted');
    }
}
