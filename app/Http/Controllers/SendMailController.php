<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\EventEmail;
use App\Models\Contact;
use App\Models\CategoryMessage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class SendMailController extends Controller
{
    //
     public function send(Request $request)
    {
        // $validation = Validator::make($request->all(),[
        //  "name" => "required|min:5|max:100",
        //  "phone" => "required|digits_between:10,12",
        // ])->validate();

        // if ($validation->fails()) {
     //        return response()->json($validation->errors(), 400);
     //    }
        $no_peserta = $request->get('no_peserta');
        $name = $request->get('name');
        $username = $request->get('username');
        $phone = $request->get('phone');
        $subject = $request->get('subject');
        $category = $request->get('category');
        $province = $request->get('province');
        $city = $request->get('city');



        $new_contact = new Contact;
        $new_contact->name = $name;
        $new_contact->email = null;
        $new_contact->phone = $phone;
        $new_contact->category_id = $category;
        $new_contact->message = null;
        $new_contact->province = $province;
        $new_contact->city = $city;
        $new_contact->ip_address = null;
        $new_contact->username = $username;

        $new_contact->save();

        $category_message=CategoryMessage::where('id', '=', $new_contact->category_id)->get();


        $details = [
            'title' => 'Event Anniversary Evoush 2021',
            'url' => 'https://evoush.com',
            'no_peserta' => $no_peserta,
            'name' => $name,
            'username' => $username,
            'phone' => $phone,
            'subject' => $subject,
            'category' => $category_message[0]->category_name,
            'province' => $province,
            'city' => $city
        ];

        try {

            Mail::to('evoushofficiall@gmail.com')->send(new EventEmail($details));
            return response()->json([
                'message' => 'Email has been sent.',
                'data' => $new_contact
            ], Response::HTTP_OK);




        } catch(\Exception $e){
            echo "Email gagal dikirim karena $e.";
        }
        // $email = 'evoush2021@gmail.com';
        // $data = [
        //     'title' => 'Selamat datang!',
        //     'body' => 'Testing email menggunakan laravel',
        // ];
        // \Mail::to($email)->send(new EventEmail($data));
        // return 'Berhasil mengirim email!';

    }
}