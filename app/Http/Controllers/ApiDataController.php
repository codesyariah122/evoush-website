<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiData;
use App\Models\User;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Joining;
use App\Models\Product;
use App\Models\CategoryMessage;
use App\Models\Contact;
use App\Models\Event;

use Validator;
use Auth;

class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $context = [
            'title' => 'Evoush::Official | Home::Page',
            'canonical' => 'https://evoush.com/',
            'meta_desc' => 'Evoush::Official | Home::Page',
            'meta_key' => 'Bisnis Network Marketing Zaman Now Ya Evoush Indonesia',
            'meta_author' => 'Evoush::Official | Home::Page',
            'og_title' => 'Evoush::Official | Home::Page',
            'og_site_name' => 'Evoush::Official | Home::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/',
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return view('pages.testing.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show_all()
    {
        $data = ApiData::all();
        return json_decode($data);
    }

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
        $data = new ApiData;
        $data->title = $request->get('title');
        $data->content = $request->get('content');
        $data->save();
        return response()->json(['message' => 'Successfully send new data : '.$data->title]);
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
        //
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

    // =========================================================================================

    // Regenerate api data all page using axios 

    public function data_event()
    {
        $event = Event::get();
        return json_decode($event);
    }


    public function store_new_member(Request $request)
    {

        $validation = \Validator::make($request->all(),[
           "name" => "required|min:5|max:100",
           "email" => "required|email|unique:users",
           "phone" => "required|digits_between:10,15",
           "province" => "required",
           "city" => "required",
           "password" => "required",
           "password_confirmation" => "required|same:password"
       ])->validate();

        
        $username_path = $request->get('username_path');

        $new_user = new User;
        $new_user->name = strtolower($request->get('name'));
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->username = trim(preg_replace('/\s+/', '', $new_user->name));

        // echo $new_user->username;
        
        $new_user->roles = json_encode($request->get('roles'));
        // $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        // if($request->file('avatar')){
        //   $file = $request->file('avatar')->store($new_user->username.'/profile', 'public');
        //   $new_user->avatar = $file;
        // }
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
        $new_profile->province = $provinsi;
        $new_profile->city = $request->get('city');
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
        
        if($new_join->count() > 0){
            // return redirect()->route('member.username', [$username_path])->with('status', 'Username anda : '.$new_user->username.' berhasil dibuat selanjutnya system kami akan memproses setelah pihak sponsor mengaktivasi akun member anda.');
            return response()->json(['message' => $new_user->username.' berhasil join member baru, selanjutnya klik tombol aktivasi akun.']);
        }else{
            return response()->json(['message' => 'Proses join gagal, ada kesalahan teknis di server kami.']);
        }
    }

    public function search_member(Request $request)
    {
        $keyword = $request->segment(4);
    
        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where("name", "LIKE", "%$keyword%")->get(['profile.*', 'users.*']);
        return json_decode($profiles);
    }

    public function data_member(Request $request)
    {
        $keyword = $request->username;
        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where('username', "LIKE", "%$keyword%")->get(['profile.*', 'users.*']);

        if(count($profiles) > 0){
            return json_decode($profiles);
        }else{
            return json_encode(['message' => 'Member belum terdaftar']);
        }
        
    }

    public function member_join_active(Request $request)
    {
        $keyword = $request->username;
        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where('username', "LIKE", "%$keyword%")->get(['profile.*', 'users.*']);

        if(count($profiles) > 0){
            $sponsor_id = $profiles[0]->id;
            $member = Member::join('profile', 'member.user_id', '=', 'profile.user_id')
            ->join('users', 'member.user_id', '=', 'users.id')
            ->where('sponsor_id', '=', $sponsor_id)
            ->where('status', '=', 'ACTIVE')
            ->get(['profile.*', 'users.*']);
            if(count($member) > 0){
                return json_decode($member);
            }else{
                $message = "Belum ada member join";
                return json_encode(['message' => $message]);
            }
        }else{
            $message = "Data sponsor belum tersedia";
            return json_encode(['message' => $message]);
        }
    }

    public function member_join_inactive(Request $request)
    {
        $keyword = $request->username;
        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where('username', "LIKE", "%$keyword%")->get(['profile.*', 'users.*']);

        if(count($profiles) > 0){
            $sponsor_id = $profiles[0]->id;
            $member = Member::join('profile', 'member.user_id', '=', 'profile.user_id')
            ->join('users', 'member.user_id', '=', 'users.id')
            ->where('sponsor_id', '=', $sponsor_id)
            ->where('status', '=', 'INACTIVE')
            ->get(['profile.*', 'users.*']);
            if(count($member) > 0){
                return json_decode($member);
            }else{
                $message = "Belum ada member join";
                return json_encode(['message' => $message]);
            }
        }else{
            $message = "Data sponsor belum tersedia";
            return json_encode(['message' => $message]);
        }
    }


    public function categorymessage(Request $request)
    {
        $data = CategoryMessage::get();
        return json_encode($data);
    }


    // Api Data Product
    public function kosmetik(Request $request)
    {
        $category = $request->segment(3);
        // $data = Product::with('categories')->get();
        // $data = Product::with(['categories' => function($query){
        //     $query->where('name', 'Kosmetik');
        // }])->get();
        $data = Product::with(['categories' => function($query){
            $query->where('name', 'Kosmetik');
        }])
        ->whereIn('id', [4, 5, 6, 7, 8, 9, 10, 11, 12])
        ->paginate(6);
       
        return json_encode($data);
    }

    public function nutrisi(Request $request)
    {
        $data = Product::with(['categories' => function($query){
            $query->where('name', 'Nutrisi');
        }])
        ->whereIn('id', [1, 2, 3, 14])
        ->paginate(6);
       
        return json_encode($data);
    }

    public function detail(Request $request, $category, $slug)
    {
        $category = $request->segment(2);
        if($category == "Kosmetik"){
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Kosmetik');
            }])
            ->where('slug', $slug)
            ->get();
        }else{
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Nutrisi');
            }])
            ->where('slug', $slug)
            ->get();
        }

        return json_encode($data);

    }

    public function show_product_categories(Request $request, $category, $slug)
    {
        if($request->segment(3) == "Kosmetik"){
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Kosmetik');
            }])
            ->where('slug', $slug)
            ->get();
        }else{
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Nutrisi');
            }])
            ->where('slug', $slug)
            ->get();
        }
        return json_encode($data);
    }

    public function paging(Request $request, $category, $id)
    {
        if($request->segment(3) == "Kosmetik"){
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Kosmetik');
            }])
            ->where('id', $id)
            ->get();
        }else{
            $data = Product::with(['categories' => function($query){
                $query->where('name', 'Nutrisi');
            }])
            ->where('id', $id)
            ->get();
        }
        return json_encode($data);
    }

    public function top_leaders(Request $request)
    {
        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->whereIn('users.id', [3, 4, 5, 6, 8])
                    ->get(['profile.*', 'users.*']);

        return json_decode($members);
    }

    public function member_list(Request $request)
    {
        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->paginate(6);

        return json_encode($members);
    }

    public function profile_data_public(Request $request)
    {
        $users = User::join('profile', 'users.id', '=', 'profile.user_id')
                ->where('status', '=', 'ACTIVE')
                ->where('username', $request->username)
                ->get(['profile.*', 'users.*']);

        if(count($users) > 0){
            return json_encode($users);
        }else{
            return json_encode(['message' => 'Data member tidak ditemukan / member mungkin belum terdaftar']);  
        }
    }

    public function profile_data_login(Request $request)
    {
        $users = User::join('profile', 'users.id', '=', 'profile.user_id')
                ->where('status', '=', 'ACTIVE')
                ->where('username', $request->username)
                ->get(['profile.*', 'users.*']);

        if(count($users) > 0){
            return json_encode($users);
        }else{
            return json_encode(['message' => 'Data member tidak ditemukan / member mungkin belum terdaftar']);  
        }
    }

    public function member_join($id)
    {
        $joins = User::join('member', 'member.user_id', '=', 'users.id')
        ->where('member.sponsor_id', '=', $id)
        ->where('status', '=', 'INACTIVE')
        ->get();
    }


}
