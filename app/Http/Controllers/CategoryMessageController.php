<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\CategoryMessage;

use Auth;

class CategoryMessageController extends Controller
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

        if(Gate::allows('manage-categories')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });

    }
    
    public function index()
    {
        $data = CategoryMessage::paginate(10);
        $context = [
            'title' => 'Category Message',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'lists' => $data
        ];
        return view('dashboard.category_message.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = [
            'title' => 'Create Category Message',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10)
        ];

        return view('dashboard.category_message.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
           "category_name" => "required|min:3|max:20",
           "caption" => "required"
       ])->validate();

       $new_category = new \App\Models\CategoryMessage;
       $new_category->category_name = $request->get('category_name');
       $new_category->caption = $request->get('caption');

       $new_category->save();
        
        return redirect()->route('categorymessage.create')->with('status',
        'Category successfully created');
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
        $category_to_edit = CategoryMessage::findOrFail($id);
        $context = [
            'title' => "Edit Category Message",
            'brand' => 'evoush',
            'category' => $category_to_edit,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.category_message.edit', $context);
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
        $category = CategoryMessage::findOrFail($id);

        \Validator::make($request->all(), [
           "category_name" => "required|min:3|max:20",
           "caption" => [
               "required",
               Rule::unique("category_message")->ignore($category->caption, "caption")
           ]
       ])->validate();
        $name = $request->get('category_name');
        $caption = $request->get('caption');
        $category->category_name = $name;
        $category->caption = $caption;

        $category->save();
        return redirect()->route('categorymessage.edit', [$id])->with('status', 'Category Message succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = CategoryMessage::findOrFail($id);
        $contact->delete();
        return redirect()->route('categorymessage.index')
        ->with('status', 'Contact successfully moved to trash');
    }

    public function trash()
    {
        // $deleted_contact = Contact::join('category_message', 'contact_message.category_id', '=', 'category_message.id')->onlyTrashed()->get(['contact_message.*', 'category_message.category_name']);
        $deleted_contact = CategoryMessage::onlyTrashed()->paginate(10);
        $context = [
            'title' => 'Category Message Trash',
            'brand' => 'evoush',
            'categories' => $deleted_contact,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.category_message.trash', $context);
    }

    public function restore($id){
       $contact = CategoryMessage::withTrashed()->findOrFail($id);
       if($contact->trashed()){
           $contact->restore();
       } else {
           return redirect()->route('categorymessage.index')
           ->with('status', 'Contact is not in trash');
       }
       return redirect()->route('categorymessage.index')
       ->with('status', 'Contact successfully restored');
    }

    public function deletePermanent($id){
        $contact = CategoryMessage::withTrashed()->findOrFail($id);
        if(!$contact->trashed()){
             return redirect()->route('categorymessage.index')
             ->with('status', 'Can not delete permanent active category');
         } else {
             $contact->forceDelete();
             return redirect()->route('categorymessage.index')
             ->with('status', 'Contact permanently deleted');
         }
    }

    public function ajaxSearch(Request $request){
       $keyword = $request->get('q');
       $categories = CategoryMessage::where("category_name", "LIKE", "%$keyword%")->get();
       return json_encode($categories);
    }
}
