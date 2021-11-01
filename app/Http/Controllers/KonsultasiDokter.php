<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Konsultasi;
use App\Models\User;
use Auth;
use Validator;

class KonsultasiDokter extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){

        if(Gate::allows('manage-consults')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $filterKeyword = $request->get('keyword');

        $fullname = $request->get('fullname');

        if($fullname){
            $consults = Konsultasi::where('fullname', $fullname)->paginate(10);
        } else {
            $consults = Konsultasi::paginate(10);
        }

        if($filterKeyword){
            if($fullname){
                $consults = Konsultasi::where('email', 'LIKE', "%$filterKeyword%")
                    ->where('fullname', $fullname)
                    ->paginate(10);
            } else {
                $consults = Konsultasi::where('email', 'LIKE', "%$filterKeyword%")
                    ->paginate(10);
            }
        }

        // echo count($users); die;

        $context = [
            'title' => 'Konsultasi Dokter',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'consults' => $consults
        ];

        return view('dashboard.konsultasi.index', $context);
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
        $validation = Validator::make($request->all(),[
         "fullname" => "required|min:5|max:100",
         "phone" => "required|max:20",
         "message" => "required",
         "age" => "required",
         "gender" => "required"
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(), 400);
        }else{
            $fullname = $request->get('fullname');
            $username = $request->get('username');
            $phone = $request->get('phone');
            $message = $request->get('message');
            $city = $request->get('city');
            $age = $request->get('age');
            $gender = $request->get('gender');
            $status = $request->get('status');

            $consults_send = new Konsultasi;
            $consults_send->fullname = $fullname;
            $consults_send->username = $username;
            $consults_send->phone = $phone;
            $consults_send->message = $message;
            $consults_send->city = $city;
            $consults_send->age = $age;
            $consults_send->gender = $gender;
            $consults_send->status = $status;
            $consults_send->save();

            return response()->json([
                'message' => 'Pertanyaan anda berhasil dikirim',
                'data' => $consults_send
            ]);
        }
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
        $consult = Konsultasi::findOrFail($id);
        $send_to_dokter = "Hallo%20Dokter%20Winda,%20Silahkan%20Buka%20Aplikasi%20Chat%20Crisp%20Anda%20, salah%20satu%20member%20evoush,%20".$consult->fullname."%20.%20Dengan%20username%20:%20".$consult->username."%20Ingin%20berkonsultasi%20dengan%20Dokter.";
         $context = [
            'title' => 'Detail Konsultasi',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'consult' => $consult,
            'sending' => $send_to_dokter,
            'dokter_phone' => '6281211676969'
        ];

        return view('dashboard.konsultasi.detail', $context);
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
        $consult_update = Konsultasi::findOrFail($id);
        $status = $request->get('status');
        $consult_update->status = $status;
        $consult_update->save();
        return redirect()->route('consults.index', $consult_update->id)->with('status', 'Data has been updated');
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
