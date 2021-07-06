public function store_new_member(Request $request)
    {
        // return json_decode($request->all());
        $username_path = $request->get('username_path');

        $validation = \Validator::make($request->all(),[
           "name" => "required|min:5|max:100",
           "email" => "required|email|unique:users",
           "phone" => "required|digits_between:10,15",
           "avatar" => "required",
           "quotes" => "required|min:20|max:100",
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
          $file = $request->file('avatar')->store($new_user->username.'/profile', 'public');
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

        if($new_join->count() > 0){
            return redirect()->route('member.username', [$username_path])->with('status', 'Username anda : '.$new_user->username.' berhasil dibuat selanjutnya system kami akan memproses setelah pihak sponsor mengaktivasi akun member anda.');
        }else{
            return redirect()->route('member.username', [$username_path])->with('errors', 'Terjadi kesalahan saat proses pendaftaran / anda belum mengisi form input join dengan benar');
        }
        
    }