<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\DeliverKonsultasi;
use App\Models\Konsultasi;
use App\Models\User;
use Auth;
use Validator;

class DeliveryConsultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){

        if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $delivers = DeliverKonsultasi::paginate(10);

        $context = [
            'title' => 'Konsultasi Dokter',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'delivers' => $delivers
        ];

        return view('dashboard.konsultasi.deliver', $context);
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
        $deliver_details = DeliverKonsultasi::join('konsultasis', 'deliver_konsultasis.consult_id', '=', 'konsultasis.id')
                        ->where('deliver_konsultasis.id', '=', $id)
                        ->get('konsultasis.*', 'deliver_konsultasis.*');
         $context = [
            'title' => 'Konsultasi Dokter',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'deliver_details' => $deliver_details
        ];

        return view('dashboard.konsultasi.deliver_detail', $context);
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
}
