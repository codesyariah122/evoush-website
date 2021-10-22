<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Mail\LoginWebReplikaEmail;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){

         if(Gate::allows('manage-users')) return $next($request);
         abort(403, 'Anda tidak memiliki cukup hak akses');
     });

    }

    public function index(Request $request)
    {
        //
        $filterKeyword = $request->get('keyword');

        $status = $request->get('status');

        if($status){
            $users = User::where('status', $status)->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        if($filterKeyword){
            if($status){
                $users = User::where('email', 'LIKE', "%$filterKeyword%")
                ->where('status', $status)
                ->paginate(10);
            } else {
                $users = User::where('email', 'LIKE', "%$filterKeyword%")
                ->paginate(10);
            }
        }

        // echo count($users); die;

        $context = [
            'title' => 'User List',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'users' => $users
        ];

        return view('dashboard.users.index', $context);
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
        'title' => 'Create User',
        'brand' => 'evoush',
        'users' => User::paginate(10)
    ];
    return view('dashboard.users.create', $context);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
         "name" => "required|min:5|max:100",
         "username" => "required|min:5|max:20|unique:users",
         "roles" => "required",
           // "phone" => "required|digits_between:10,14",
           // "avatar" => "required",
         "email" => "required|email|unique:users",
         "password" => "required",
         "password_confirmation" => "required|same:password"
     ])->validate();

        $new_user = new User;
        $new_user->name = $request->get('name');
        $new_user->username = strtolower($request->get('username'));
        $new_user->roles = json_encode($request->get('roles'));
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->achievements = $request->get('achievements') ? json_encode($request->get('achievements')) : NULL;

        if($request->file('avatar')){
          $file = $request->file('avatar')->store($new_user->username.'/profile', 'public');
          $new_user->avatar = $file;
      }else{
        $new_user->avatar = null;
    }

    $new_user->save();

    $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');
        // $prov = file_get_contents($url);
        // $data = json_decode($prov, 1);
        // $provinsi = $data['nama'];

        // ubah curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, $url);
    $result = curl_exec($curl);
    $data = json_decode($result, 1);
    $provinsi = $data['nama'];
        // echo $provinsi;
        // echo "<pre>";
        // var_dump($data); die;
        // echo "</pre>";

    $new_userid = $new_user->id;
    $new_profile = new Profile;
    $new_profile->user_id = $new_userid;
    $new_profile->quotes = $request->get('quotes');

    if($request->file('cover')){
        $file = $request->file('cover')->store($new_user->username.'/covers', 'public');
        $new_profile->cover = $file;
    }

    if($request->file('parallax')){
        $file = $request->file('parallax')->store($new_user->username.'/parallax', 'public');
        $new_profile->cover = $file;
    }

    $new_profile->about = $request->get('about');
    $new_profile->instagram = $request->get('instagram');
    $new_profile->facebook = $request->get('facebook');
    $new_profile->youtube = $request->get('youtube');
    $new_profile->province = $provinsi;
    $new_profile->city = $request->get('city');

    $new_profile->save();

    return redirect()->route('users.create')->with('status', 'Username : '.$new_user->username.' successfully created');

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
        $context = [
            'title' => 'User Detail',
            'brand' => 'evoush',
            // 'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'user' => User::findOrFail($id)
        ];
        return view('dashboard.users.detail', $context);
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
            'title' => 'User Edit',
            'brand' => 'evoush',
            // 'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'user' => User::findOrFail($id)
        ];
        return view('dashboard.users.edit', $context);
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
        \Validator::make($request->all(), [
         "name" => "required|min:5|max:100",
         "roles" => "required",
         "phone" => "required|digits_between:10,15",
           // "address" => "required|min:20|max:200",
     ])->validate();

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        // $user->email = $request->get('email');
        $user->username = strtolower($request->get('username'));
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->status = $request->get('status');
        $user->achievements = json_encode($request->get('achievements'));

        if($request->file('avatar')){
            if($user->avatar && file_exists(storage_path('app/public/'.$user->username .'/' . $user->avatar))){
                \Storage::delete('public/'.$user->username.'/'.$user->avatar);
            }
            $file = $request->file('avatar')->store($user->username.'/profile', 'public');
            $user->avatar = $file;
        }

        $user->save();

        return redirect()->route('users.edit', $user->id)->with('status', 'User succesfully updated');

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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User successfully delete');
    }

    public function send_information($id)
    {
        $user = User::Join('profile', 'users.id', '=', 'profile.user_id')
                ->findOrFail($id);
        $context = [
            'title' => 'Send Email To Member',
            'brand' => 'evoush',
            // 'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'user' => $user
        ];
        return view('dashboard.users.send_email', $context);
    }

    public function sending_email(Request $request)
    {
        $validation = \Validator::make($request->all(),[
           "name" => "required|min:5|max:100",
           "email" => "required|email",
           "check_password" => "required",
           "username" => "required|min:5|max:20"
        ])->validate();


        if (!Hash::check($request->check_password, $request->password_db)) {

            return redirect()->route('send.email', [$request->id])->with('status', 'Error sending email password not match');
        }

        $details = [
            'title' => 'Email From Website evoush::official',
            'url' => 'https://evoush.com',
            'logo' => 'https://raw.githubusercontent.com/evoush-products/bahan_evoush/master/assets/img/LOGO231.png',
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->check_password,
            'email' => $request->email,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city
        ];

        try {

            Mail::to($details['email'])->send(new LoginWebReplikaEmail($details));
            // return response()->json([
            //     'message' => 'Email has been sent.',
            //     'data' => $details
            // ], Response::HTTP_OK);
            return redirect()->route('users.index')->with('status', 'Informasi Login Baru Saja Terkirim ke username :'.$details['email']);

        } catch(\Exception $e){
            echo "Email gagal dikirim karena $e.";
        }
   }
}
