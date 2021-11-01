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
use App\Models\Konsultasi;
use App\Models\DeliverKonsultasi;
use Twilio\Rest\Client;

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
        // return response()->json(['data' => $request->all()]);

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

        // return response()->json(['data' => $username_path]);

        $new_user = new User;
        $new_user->name = strtolower($request->get('name'));
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->username = trim(preg_replace('/\s+/', '', $new_user->name));
        $new_user->achievements = null;

        // echo $new_user->username;

        $new_user->roles = json_encode($request->get('roles'));
        // $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        if($request->file('avatar')){
          $file = $request->file('avatar')->store($new_user->username.'/profile', 'public');
          $new_user->avatar = $file;
        }
        $new_user->status = $request->get('status');
        $new_user->save();

        $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');
        $prov = file_get_contents($url);
        $data_prov = json_decode($prov, 1);
        // echo $data_prov['nama'];
        // die;
        $provinsi = $data_prov['nama'];
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

        // $sponsor = User::join('profile', 'users.id', '=', 'profile.user_id')
        // ->where("roles", "=", json_encode("MEMBER"))
        // ->where("users.id", "=", $new_member->sponsor_id)
        // ->get(['profile.*', 'users.*']);

        // var_dump($sponsor); die;

        $new_join = new Joining;
        // $new_join->username = $new_username;
        $new_join->member_id = $new_member->id;
        $new_join->user_id = $new_member->user_id;
        $new_join->save();



        return response()->json([
            'message' => '<b class="text-primary">'.$new_user->username.'</b> berhasil join member baru, dari sponsor <b class="text-info">'.$username_path.'</b> selanjutnya klik tombol aktivasi akun dibawah ini.',
            'data' => $new_user]);

        // if($new_join->count() > 0){
        //     // return redirect()->route('member.username', [$username_path])->with('status', 'Username anda : '.$new_user->username.' berhasil dibuat selanjutnya system kami akan memproses setelah pihak sponsor mengaktivasi akun member anda.');
        //     return response()->json(['message' => $new_user->username.' berhasil join member baru, selanjutnya klik tombol aktivasi akun.']);
        // }else{
        //     return response()->json(['message' => 'Proses join gagal, ada kesalahan teknis di server kami.']);
        // }
    }

    public function search_member(Request $request)
    {
        $keyword = $request->segment(4);

        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where("username", "LIKE", "%$keyword%")
        ->where("roles", "=", json_encode(['MEMBER']))
        // ->orWhere("roles", "=", json_encode(['FOLLOWER']))
        ->get(['profile.*', 'users.*']);
        try{
            if(count($profiles) > 0){
                return response()->json([
                    'message' => 'Data username '.$keyword.' ditemukan',
                    'data' => $profiles
                ]);
            }else{
                return response()->json([
                    'message' => 'Data username '.$keyword.' tidak ditemukan/belum terdaftar (Cek administrator web)',
                    'data' => null
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'message' => 'Error fetch data',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function data_member(Request $request)
    {
        $keyword = $request->username;
        $profiles = User::join('profile', 'users.id', '=', 'profile.user_id')
        ->where('username',  $keyword)
        ->get(['profile.*', 'users.*']);

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
        try{
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
        }catch(Exception $e){
            return response()->json([
                'message' => 'Fetch anjing',
                'data' => $e->getMessage()
            ], 404);
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

    public function allProduct()
    {
        $data = Product::with(['categories'])
            ->orderBy('id', 'DESC')
            ->get();
        return json_encode($data);
    }

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
        ->orderBy('id', 'Desc')
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

    public function top_income(Request $request)
    {
        $ids = [5,3,4,9,8,10,11,19,7,16];
        $orders = array_map(function($item) {
            return "users.id = {$item} desc";
        }, $ids);
        $rawOrder = implode(', ', $orders);

        // var_dump($id_order); die;

        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->whereIn('users.id', $ids)
                    ->orderByRaw($rawOrder)
                    ->get(['profile.*', 'users.*']);
        return json_decode($members);
    }

    public function member_list(Request $request)
    {
        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->whereIn('users.id', [3, 5, 4, 7, 8, 9, 11, 12, 13, 14, 15, 16, 18, 19])
                    ->orderBy('achievements', 'DESC')
                    // ->get();
                    ->paginate(9);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'success fetch member data',
        //     'data' => $members
        // ]);
        return json_encode($members);
    }

    public function founder_list(Request $request)
    {
        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    // ->where('roles', '=', json_encode(['MEMBER']))
                    ->whereIn('users.id', [3, 6, 7, 10])
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


    public function update_avatar(Request $request, $id)
    {
        $update_avatar = User::findOrFail($id);
        $avatar = $request->file('avatar');
        if($avatar){
            if($update_avatar->avatar && file_exists(storage_path('app/public/'.$update_avatar->username .'/' . $update_avatar->avatar))){
                \Storage::delete('public/'.$update_avatar->username.'/'.$update_avatar->avatar);
            }
            $file = $avatar->store($update_avatar->username.'/profile', 'public');
            $update_avatar->avatar = $file;
        }

        $update_avatar->save();


        return response()->json([
            'message' => 'Success upload image',
            'data' => $update_avatar->avatar
        ]);

    }

    public function update_cover(Request $request, $id)
    {
        $update_user = User::findOrFail($id);
        $update_cover = Profile::findOrFail($id);
        $cover = $request->file('cover');
        if($cover){
            if($update_cover->cover && file_exists(storage_path('app/public/'.$update_user->username .'/' . $update_cover->cover))){
                \Storage::delete('public/'.$update_user->username.'/'.$update_cover->cover);
            }
            $file = $cover->store($update_user->username.'/covers', 'public');
            $update_cover->cover = $file;
        }

        $update_cover->save();


        return response()->json([
            'message' => 'Success upload image',
            'data' => $update_cover->cover
        ]);

    }



    public function profile_member_update(Request $request, $id)
    {

       $validator = Validator::make($request->all(), [
           "name" => "required|min:5|max:100",
           // "avatar" => "required|image|mimes:jpeg,png,jpg,gif,svg",
           "phone" => "required|digits_between:10,15",
           "email" => "required|email",
           "username" => "required",
           "province" => "required",
           "city" => "required"
       ]);
       if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Updated User By field user_id on table profile
        $update_user = User::findOrFail($id);

        // return response()->json(['data' => $update_user]);

        $update_user->name = $request->get('name');

        // if($request->file('avatar')){
        //     if($update_user->avatar && file_exists(storage_path('app/public/'.$update_user->username .'/' . $update_user->avatar))){
        //         \Storage::delete('public/'.$update_user->username.'/'.$update_user->avatar);
        //     }
        //     $file = $request->file('avatar')->store($update_user->username.'/profile', 'public');
        //     $update_user->avatar = $file;
        // }
        $update_user->email = $request->get('email');
        $update_user->username = $request->get('username');
        $update_user->address = $request->get('address');
        $update_user->phone = $request->get('phone');
        $update_user->save();

        $dataProfile = User::join('profile', 'users.id', '=', 'profile.user_id')->findOrFail($id);

        if($dataProfile !== ''){
            if($dataProfile->province === $request->get('province')){
                $provinsi = $request->get('province');
            }else{
                $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');
                $prov = file_get_contents($url);
                $data_prov = json_decode($prov, 1);
                $provinsi = $data_prov['nama'];
            }
        }

        // return response()->json(['data' => $provinsi]);


        $profile = Profile::findOrFail($id);
        $profile->quotes = $request->get('quotes');
        // if($request->file('cover')){
        //     if($profile->cover && file_exists(storage_path('app/public/'.$update_user->username.'/'.$profile->cover))){
        //         \Storage::delete('public/'.$update_user->username.'/covers/'.$profile->cover);
        //     }
        //     $file = $request->file('cover')->store($update_user->username.'/covers', 'public');
        //     $profile->cover = $file;
        // }
        $profile->about = $request->get('about');
        $profile->instagram = $request->get('instagram');
        $profile->facebook = $request->get('facebook');
        $profile->youtube = $request->get('youtube');
        $profile->province = $provinsi;
        $profile->city = $request->get('city');
        if($request->file('parallax')){
            if($profile->parallax && file_exists(storage_path('app/public/'.$update_user->username.'/'.$profile->parallax))){
                \Storage::delete('public/'.$update_user->username.'/parallax/'.$profile->parallax);
            }
            $file = $request->file('parallax')->store($update_user->username.'/parallax', 'public');
            $profile->parallax = $file;
        }

        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Updated',
            'data'    => $profile
        ], 200);

        // return response()->json(['message' => 'Data berhasil diupdate ']);

        // if($profile->count() > 0){
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Data Updated',
        //         'data'    => $profile
        //     ], 200);
        //     // return response()->json(['message' => 'Data berhasil diupdate']);
        // }else{
        //    return response()->json([
        //         'success' => false,
        //         'message' => 'Data not found Error',
        //     ], 404);
        //     // return response()->json(['message' => 'Data gagal diupdate ']);
        // }

    }

    public function contact_message(){
        $contacts = Contact::get();
        return response()->json([
            'message' => 'Contact Massage Evoush',
            'data' => $contacts
        ]);
    }

    public function new_member_activation(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->get('status');
        $user->save();

        try{
            return response()->json([
                'message' => $user->username.' berhasil di aktivasi',
                'data' => $user
            ]);
        }catch(\Exception $e){
            echo "Member gagal di aktivasi $e.";
        }
    }

    public function sendMessage(Request $request)
    {
        $recipients = $request->get('recipients');
        $message = $request->get('message');
        // return response()->json([
        //     'data' => [
        //         'number' => $recipients,
        //         'message' => $message
        //     ]
        // ]);

        try{
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");

            $client = new Client($account_sid, $auth_token);
            $client->message->create($recipients, ['from' => $twilio_number, 'body' => $message]);
            return response()->json([
                'success' => true,
                'message' => 'SMS has a sending'
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function curl_data($data_){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $data_);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

       return json_decode($result, 1);

    }

    public function getYoutubeChannel($channel_id)
    {
        $part = 'snippet,contentDetails,statistics,brandingSettings';
        $api_key = 'AIzaSyBVnOyEii1WdvQQjJzIDTgoBCqr_t8y4fc';
        $profile_yt = 'https://www.googleapis.com/youtube/v3/channels?part='.$part.'&id='.$channel_id.'&key='.$api_key;

        $channel_yt = $this->curl_data($profile_yt);

        try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch youtube data',
                'data' => $channel_yt
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }

    }

    public function getLatestYoutubeVideo($channel_id, $maxResult, $order)
    {
        $part = 'snippet';
        $api_key = 'AIzaSyBVnOyEii1WdvQQjJzIDTgoBCqr_t8y4fc';
        $latest_vid = 'https://www.googleapis.com/youtube/v3/search?key='.$api_key.'&channelId='.$channel_id.'&maxResult='.$maxResult.'&order='.$order.'&part='.$part;

        $latestVideo_yt = $this->curl_data($latest_vid);


        try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch youtube data',
                'data' => $latestVideo_yt
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function getPlaylistVideo($channel_id, $maxResult, $playlist_id )
    {
        $part = 'snippet,contentDetails';
        $api_key = 'AIzaSyBVnOyEii1WdvQQjJzIDTgoBCqr_t8y4fc';
        $playlist_vid = 'https://www.googleapis.com/youtube/v3/playlistItems?key='.$api_key.'&channelId='.$channel_id.'&maxResult='.$maxResult.'&part='.$part.'&playlistId='.$playlist_id;

        $playlistVideo_yt = $this->curl_data($playlist_vid);


        try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch youtube data',
                'data' => $playlistVideo_yt
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function getVideo($video_id)
    {
          $part = 'snippet,contentDetails,player';
          $api_key = 'AIzaSyBVnOyEii1WdvQQjJzIDTgoBCqr_t8y4fc';
          $video_yt = 'https://www.googleapis.com/youtube/v3/videos?key='.$api_key.'&part='.$part.'&id='.$video_id;
          // $playlist_vid = 'https://www.googleapis.com/youtube/v3/playlistItems?key='.$api_key.'&channelId='.$channel_id.'&maxResult='.$maxResult.'&part='.$part.'&playlistId='.$playlist_id;

          $PlayVideo_yt = $this->curl_data($video_yt);


          try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch youtube data',
                'data' => $PlayVideo_yt
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function searchYoutubeVideo($keyword)
    {
        $q = trim(preg_replace('/\s+/', '', $keyword));
        $part = 'snippet';
        $result = 50;
          $api_key = 'AIzaSyBVnOyEii1WdvQQjJzIDTgoBCqr_t8y4fc';
          $video_yt = 'https://www.googleapis.com/youtube/v3/search?key='.$api_key.'&part='.$part.'&q='.$keyword.'&maxResults='.$result;

          $SearchVideo_yt = $this->curl_data($video_yt);


          try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch youtube data',
                'data' => $SearchVideo_yt
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function check_resi(Request $request)
    {
        $apiKey = '30eb148d32f54f281851220fc4be39250f0153e9ec509acb80f32ca50dde94ca';
        $awb = $request->awb;
        $courier = $request->courier;

        $url = 'https://api.binderbyte.com/v1/track?api_key='.$apiKey.'&courier='.$courier.'&awb='.$awb;
        $check_resi = $this->curl_data($url);

        try{
            return response()->json([
                'success' => true,
                'message' => 'Success fetch check resi',
                'data' => $check_resi
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function sending_consults(Request $request)
    {
        $validation = Validator::make($request->all(),[
         "fullname" => "required|min:5|max:100",
         "username" => "required|unique:users,username",
         "phone" => "required|max:20",
         // "message" => "required",
         "age" => "required",
         "gender" => "required"
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(), 400);
        }else{
            $fullname = $request->get('fullname');
            $username = $request->get('username');
            $phone = $request->get('phone');
            // $message = $request->get('message');
            $city = $request->get('city');
            $age = $request->get('age');
            $gender = $request->get('gender');
            $status = $request->get('status');

            $consults_send = new Konsultasi;
            $consults_send->fullname = $fullname;
            $consults_send->username = $username;
            $consults_send->phone = $phone;
            // $consults_send->message = $message;
            $consults_send->city = $city;
            $consults_send->age = $age;
            $consults_send->gender = $gender;
            $consults_send->status = $status;
            $consults_send->save();

            return response()->json([
                'message' => 'Permintaan konsultasi anda berhasil dikirim',
                'data' => $consults_send
            ]);
        }
    }

    public function get_data_consult(Request $request)
    {
        $username = $request->username;

        $consult = Konsultasi::where('username', '=', $username)->get();

        // echo count($consult);

        if(count($consult) > 0){
            return response()->json([
                'message' => 'Success fetch data consultation',
                'data' => $consult
            ]);
        }else{
            return response()->json([
                'message' => 'Data not found',
                'data' => $consult
            ]);
        }

    }

    public function deliver_to_docter(Request $request)
    {
        $consult_id = $request->consult_id;
        // $message = $request->message;
        $deliverDocter = new DeliverKonsultasi;
        $deliverDocter->consult_id = $consult_id;
        // $deliverDocter->message = $message;
        $deliverDocter->save();

        $consult_update = Konsultasi::findOrFail($consult_id);
        $consult_update->status = $request->get('status');
        $consult_update->save();


        return response()->json([
            'message' => 'Data has been sending to docter',
            'data' => $deliverDocter
        ]);
    }

    public function check_active_user($email)
    {
        $user = User::where('email', $email)->first();

        try{
            return response()->json([
                'message' => 'Check user active',
                'data' => $user
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'Error fetch data',
                'data' => $e->getMessage()
            ], 404);
        }
    }

    public function check_sponsor($id)
    {
        $check_sponsor =  User::join('member', 'member.user_id', 'users.id')
                    ->findOrFail($id);

        $sponsor = User::findOrFail($check_sponsor->sponsor_id);

        try{
            return response()->json([
                'message' => 'Check Member Sponsor',
                'data' => $sponsor
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'Error fetch data member sponsor',
                'data' => $e->getMessage()
            ], 404);
        }
    }

}
