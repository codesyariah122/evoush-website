<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Profile;

use App\Models\Member;

use App\Models\Joining;

use Auth;



class ProfileController extends Controller

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



    public function show_profile(Request $request)

    {

        $context = [

            'title' => 'Profile User '. $request->segment(4),

            'brand' => 'evoush',

            // 'profile' => User::with(['profile' => function($query) {

            //     $query->where('username', Auth::user()->username);

            // }])->get()

            'profile' => User::with('profile')->where('username', $request->segment(4))->get()[0]

            // 'users' => User::where('name', Auth::user()->name)->paginate(10)

        ];



        return view('dashboard.profile.index', $context);

    }

    public function index(Request $request)

    {





       $context = [

        'title' => 'Evoush::Profile-User | '.Auth::user()->username,

        'brand' => 'evoush',

            // 'profile' => User::with(['profile' => function($query) {

            //     $query->where('username', Auth::user()->username);

            // }])->get()

            // 'profiles' => User::with('profile')->where('username', Auth::user()->username)->get()

            // 'users' => User::where('name', Auth::user()->name)->paginate(10)

        'profile' => User::join('profile', 'users.id', '=', 'profile.user_id')->where('username', Auth::user()->username)->get(['profile.*', 'users.*'])[0]

    ];



    return view('dashboard.profile.index', $context);

}



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

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

        //

        $context = [

            'title' => 'Profile Edit',

            'brand' => 'evoush',

            // 'user' => User::where('name', Auth::user()->name)->paginate(10),

            // 'users' => User::where('name', Auth::user()->name)->paginate(10)

            'user' => User::findOrFail($id),

            'profile' => User::join('profile', 'users.id', '=', 'profile.user_id')->findOrFail($id)

        ];


        if(Auth::check()){

            if(in_array("MEMBER", json_decode(Auth::user()->roles))){

                return view('dashboard.profile.editmember', $context);

            }else{

                return view('dashboard.profile.edit', $context);

            }
        }else{
            return redirect()->route('login');
        }

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        // $curl_prov = curl_init();

        // curl_setopt($curl_prov, CURLOPT_URL, 'http://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$id_prov);

        // curl_setopt($curl_prov, CURLOPT_RETURNTRANSFER, 1);

        // $result = curl_exec($curl_prov);

        // var_dump($result);

        // curl_close($curl_prov);

        // $province = json_decode($result, 1);



        // echo $province;

        \Validator::make($request->all(), [

             // "quotes" => "required|min:15|max:100",

             // "about" => "required",

           "name" => "required|min:5|max:100",

           "phone" => "required|digits_between:10,13",

           "email" => "required|email",

           "username" => "required",

           "province" => "required",

           "city" => "required"

       ])->validate();



        // Updated User By field user_id on table profile

        $update_user = User::findOrFail($id);

        $update_user->name = $request->get('name');



        // var_dump($request->file('avatar')); die;



        if($request->file('avatar')){

            if($update_user->avatar && file_exists(storage_path('app/public/'.$update_user->username .'/' . $update_user->avatar))){

                \Storage::delete('public/'.$update_user->username.'/'.$update_user->avatar);

            }

            $file = $request->file('avatar')->store($update_user->username.'/profile', 'public');

            $update_user->avatar = $file;

        }

        $update_user->email = $request->get('email');

        $update_user->username = $request->get('username');

        // $update_user->roles = json_encode($request->get('roles'));

        $update_user->address = $request->get('address');

        $update_user->phone = $request->get('phone');

        // $update_user->achievements = $request->get('achievements');

        $update_user->save();



        $dataProfile = User::join('profile', 'users.id', '=', 'profile.user_id')->findOrFail($id);





        // var_dump($dataProfile);die;



        if($dataProfile !== ''){

            if($dataProfile->province === $request->get('province')){

                $provinsi = $request->get('province');

            }else{

                $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');

                $prov = file_get_contents($url);

                $data = json_decode($prov, 1);

                $provinsi = $data['nama'];

            }

        }





        $profile = Profile::findOrFail($id);

        $profile->quotes = $request->get('quotes');

        if($request->file('cover')){

            if($profile->cover && file_exists(storage_path('app/public/'.$update_user->username.'/'.$profile->cover))){

                \Storage::delete('public/'.$update_user->username.'/covers/'.$profile->cover);

            }

            $file = $request->file('cover')->store($update_user->username.'/covers', 'public');

            $profile->cover = $file;

        }

        $profile->about = $request->get('about');

        $profile->instagram = $request->get('instagram');

        $profile->facebook = $request->get('facebook');

        $profile->youtube = $request->get('youtube');

        $profile->province = $provinsi;

        $profile->city = $request->get('city');





        // echo $profile->province; die;



        if($request->file('parallax')){

            if($profile->parallax && file_exists(storage_path('app/public/'.$update_user->username.'/'.$profile->parallax))){

                \Storage::delete('public/'.$update_user->username.'/parallax/'.$profile->parallax);

            }

            $file = $request->file('parallax')->store($update_user->username.'/parallax', 'public');

            $profile->parallax = $file;

        }



        $profile->save();







        return redirect()->route('profile.edit', $profile->id)->with('status', 'Profile succesfully updated');

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







}

