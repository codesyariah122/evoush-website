<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\ActivationNewMemberMail;
use App\Models\User;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Joining;
use Validator;

class EmailNotificationNewMember extends Controller
{
    //
    public function send(Request $request)
    {
        $validation = Validator::make($request->all(),[
         "name" => "required|min:5|max:100",
         "email" => "required|email|unique:users",
         "phone" => "required|max:20",
         "province" => "required",
         "city" => "required",
         "password" => "required",
         "password_confirmation" => "required|same:password"
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        $username_path = $request->get('username_path');

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

        $new_join = new Joining;
          // $new_join->username = $new_username;
        $new_join->member_id = $new_member->id;
        $new_join->user_id = $new_member->user_id;
        $new_join->save();

        $sponsor = User::join('profile', 'users.id', '=', 'profile.user_id')
          // ->where('roles',  json_encode("MEMBER"))
        ->where('users.id', $new_member->sponsor_id)
        ->get(['profile.*', 'users.*']);

        $details = [
          'title' => 'You Have New Member Join',
          'url' => 'https://evoush.com',
          'username' => $new_user->username,
          'sponsor' => $sponsor
        ];

        // return response()->json([
        // 	'message' => 'Success fetch',
        // 	'data' => $sponsor
        // ]);

        try {
          Mail::to('admin_evoush@evoush.com')->send(new ActivationNewMemberMail($details));
          return response()->json([
           'message' => '<b class="text-info">'.$new_user->username.'</b> proses join anda sudah dikirim ke pihak sponsor <b class="text-primary">'.$sponsor[0]->username.',</b> untuk selanjutnya menunggu  di aktivasi oleh sponsor anda.',
           'data_sponsor' => $sponsor,
           'data_member' => $new_user
         ], Response::HTTP_OK);



        } catch(Exception $e){
          return response()->json([
            'message' => $e->getMessage()
          ]);
        // echo "Email gagal dikirim karena $e.";
        }

    }
}
