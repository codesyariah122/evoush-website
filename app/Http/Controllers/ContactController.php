<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Contact;
use Auth;
class ContactController extends Controller
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

            if(Gate::allows('manage-products')) return $next($request);
           abort(403, 'Anda tidak memiliki cukup hak akses');
       });
    }

    public function index(Request $request)
    {
        // $contacts = Contact::with('category_message')->get();
        $contacts = Contact::join('category_message', 'contact_message.category_id', '=', 'category_message.id')
        ->orderBy('contact_message.id', 'ASC')
        // ->paginate(10);
        ->get(['contact_message.*', 'category_message.category_name']);
        $context = [
            'title' => 'Message List',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'contacts' => $contacts
        ];
        return view('dashboard.contacts.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = [
            'title' => 'Create Contact Message',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10)
        ];

        return view('dashboard.contact.create', $context);
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
           "email" => "required|email|unique:users",
           "phone" => "required|digits_between:10,12",
           "message" => "required",
           "username" => "unique:users"
       ])->validate();

        $new_contact = new Contact;
        $new_contact->name = $request->get('name');
        $new_contact->email = $request->get('email');
        $new_contact->phone = $request->get('code').$request->get('phone');
        $new_contact->category_id = $request->get('category_id');
        $new_contact->message = $request->get('message');
        $new_contact->country = $request->get('country');
        $new_contact->city = $request->get('city');
        $new_contact->ip_address = $request->get('ip_address');

        $new_contact->save();

        return redirect('/contact#form-contact')->with('status', 'Terima kasih '.$new_contact->name.', Pesan anda akan segera di proses management evoush');

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
        $contact = \App\Models\Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')
        ->with('status', 'Contact successfully moved to trash');
    }

    public function trash()
    {
        // $deleted_contact = Contact::join('category_message', 'contact_message.category_id', '=', 'category_message.id')->onlyTrashed()->get(['contact_message.*', 'category_message.category_name']);
        $deleted_contact = Contact::join('category_message', 'contact_message.category_id', '=', 'category_message.id')->select(['contact_message.*', 'category_message.category_name'])->onlyTrashed()->paginate(10);
        $context = [
            'title' => 'Contact Trash',
            'brand' => 'evoush',
            'contacts' => $deleted_contact,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.contacts.trash', $context);
    }

    public function restore($id){
       $contact = \App\Models\Contact::withTrashed()->findOrFail($id);
       if($contact->trashed()){
           $contact->restore();
       } else {
           return redirect()->route('concact.index')
           ->with('status', 'Contact is not in trash');
       }
       return redirect()->route('contact.index')
       ->with('status', 'Contact successfully restored');
    }

    public function deletePermanent($id){
        $contact = \App\Models\Contact::withTrashed()->findOrFail($id);
        if(!$contact->trashed()){
             return redirect()->route('categories.index')
             ->with('status', 'Can not delete permanent active category');
         } else {
             $contact->forceDelete();
             return redirect()->route('contact.index')
             ->with('status', 'Contact permanently deleted');
         }
    }

}
