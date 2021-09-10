<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;
use App\Models\User;
use Auth;
use Validator;

class MenuManagementController extends Controller
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

         if(Gate::allows('manage-users')) return $next($request);
         abort(403, 'Anda tidak memiliki cukup hak akses');
     });

    }

    public function index(Request $request)
    {
        //
         //
        $filterKeyword = $request->get('keyword');

        $status = $request->get('status');

        if($status){
            $menus = Menu::where('status', $status)->paginate(10);
        } else {
            $menus = Menu::paginate(10);
        }

        if($filterKeyword){
            if($status){
                $menus = Menu::where('name', 'LIKE', "%$filterKeyword%")
                    ->where('status', $status)
                    ->paginate(10);
            } else {
                $menus = Menu::where('name', 'LIKE', "%$filterKeyword%")
                    ->paginate(10);
            }
        }

        // echo count($users); die;

        $context = [
            'title' => 'Menu List',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'menus' => $menus
        ];
        return view('dashboard.menu.index', $context);
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
            'title' => 'Create Menu',
            'brand' => 'evoush',
            'users' => User::paginate(10)
        ];
        return view('dashboard.menu.create', $context);
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
           "name" => "required|min:5|max:100",
           "link" => "required",
           "icon" => "required"
        ])->validate();

        $name = $request->name;
        $link = $request->link;
        $icon = $request->icon;
        $submenu = $request->submenu;

        $new_menu = Menu::create([
            'name' => $name,
            'link' => $link,
            'icon' => $icon,
            'submenu' => $submenu
        ]);

        if($new_menu){
            return redirect()->route('menus.index')->with('success', 'New menu has been created');
        }else{
            return redirect()->route('menus.create')->with('error', 'New menu failed added');
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
        $menu = Menu::findOrFail($id);
         $context = [
            'title' => 'Edit Menu',
            'brand' => 'evoush',
            'menu' => $menu,
            'users' => User::paginate(10)
        ];
        return view('dashboard.menu.edit', $context);
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
