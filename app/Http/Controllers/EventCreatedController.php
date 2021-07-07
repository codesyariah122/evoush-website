<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use App\Models\User;
use Auth;

class EventCreatedController extends Controller
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
        $categories = \App\Models\Category::paginate(10);
        $products = \App\Models\Product::with('categories')->paginate(3);
        $context = [
            'title' => 'Evosh::Event',
            'brand' => 'evoush',
            'events' => Event::paginate(10)
        ];
        return view('dashboard.event.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $context = [
            'title' => 'Create New Event',
            'brand' => 'evoush',
            'users' => User::paginate(10)
        ];
        return view('dashboard.event.create', $context);
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
        $validation = \Validator::make($request->all(),[
            "title" => "required|min:5|max:50",
            "quotes" => "required|min:20|max: 100",
            "content" => "required"           
       ])->validate();

        $new_event = new Event;
        $new_event->title = $request->get('title');
        $new_event->quotes = $request->get('quotes');
        if($request->file('cover')){
          $cover = $request->file('cover')->store('events', 'public');
          $new_event->cover = $cover;
        }else{
            $new_event->cover = '';
        }

        if($request->file('file')){
            $file = $request->file('file')->store('events.file', 'public');
            $new_event->file = $file;
        }else{
            $new_event->file = '';
        }

        $new_event->content = $request->get('content');
        $new_event->link = $request->get('link');

        $new_event->save();

        return redirect()->route('event.index')->with('status', 'Event successfully created');
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
        $context = [
            'title' => 'Event Edit',
            'brand' => 'evoush',
            // 'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'event' => Event::findOrFail($id)
        ];
        return view('dashboard.event.edit', $context);
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
        $validation = \Validator::make($request->all(),[
            "title" => "required|min:5|max:50",
            "quotes" => "required|min:20|max: 100",
            "content" => "required"           
       ])->validate();
        
        $event = Event::findOrFail($id);
        $event->title = $request->get('title');
        $event->quotes = $request->get('quotes');

        if($request->file('cover')){
            if($event->cover && file_exists(storage_path('app/public/' . $event->cover))){
                \Storage::delete('public/'.$event->cover);
            }
            $cover = $request->file('cover')->store('events', 'public');
            $event->cover = $cover;
        }
        if($request->file('file')){
            if($event->file && file_exists(storage_path('app/public/' . $event->file))){
                \Storage::delete('public/'.$event->file);
            }
            $file = $request->file('file')->store('events.file', 'public');
            $event->file = $file;
        }

        $event->content = $request->get('content');
        $event->link = $request->get('link');

        $event->save();

        return redirect()->route('event.edit', $event->id)->with('status', 'Event succesfully updated');
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
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('event.index')->with('status', 'Event successfully deleted');
    }
}
