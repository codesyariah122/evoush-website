<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use App\Models\Contact;
use App\Models\CategoryMessage;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class SendMailController extends Controller
{
    //
     public function send(Request $request)
    {
        $validation = Validator::make($request->all(),[
         "name" => "required|min:5|max:100",
         // "phone" => "required|digits_between:10,15",
         "email" => "required|email"
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }else{
            // $no_peserta = $request->get('no_peserta');
            $name = $request->get('name');
            $phone = $request->get('phone');
            $email = $request->get('email');
            $subject = $request->get('subject');
            $category = $request->get('category_id');
            $province = $request->get('province');
            $city = $request->get('city');
            $ip_address = $request->get('ip_address');
            $message = $request->get('message');


            $new_contact = new Contact();
            $new_contact->name = $name;
            $new_contact->email = $email;
            $new_contact->phone = $phone;
            $new_contact->category_id = $category;
            $new_contact->message = $message;

            $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->get('province');
            $prov = file_get_contents($url);
            $data_prov = json_decode($prov, 1);
            // echo $data_prov['nama'];
            // die;
            $provinsi = $data_prov['nama'];

            $new_contact->province = $provinsi;
            $new_contact->city = $city;
            $new_contact->ip_address = $ip_address;
            $new_contact->username = null;

            $new_contact->save();

            $category_message=CategoryMessage::where('id', '=', $new_contact->category_id)->get();


            $details = [
                'title' => 'Contact From Website evoush::official',
                'url' => 'https://evoush.com',
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'category' => $category_message[0]->category_name,
                'province' => $new_contact->province,
                'city' => $city
            ];

            try {

                Mail::to('evoushofficiall@gmail.com')->send(new ContactEmail($details));
                return response()->json([
                    'message' => 'Email has been sent.',
                    'data' => $new_contact
                ], Response::HTTP_OK);

            } catch(\Exception $e){
                echo "Email gagal dikirim karena $e.";
            }

        }



    }
}